<?php

namespace App\Http\Controllers\Office\offers;

use App\Model\city;
use App\Model\lands;
use App\Model\houses;
use App\Model\images;
use App\Model\region;
use App\Model\apartment;
use App\Model\commercial;
use App\Model\offer_info;
use office_accountSeeder;
use App\Model\office_info;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Model\office_clients;
use App\Model\villas_palaces;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\office\offer\step_one_validation;

class offerController extends Controller
{


    public function __construct()
    {

        // $this->middleware('auth');
    }



    public function add_offer()
    {
        $city = city::select('id', 'name')->get();
        return view('office.offers.create', compact('city'));
    }


 


    // public function step_one(Request $request)
    // {


    //     // delete data from session becouse new step
    //     if (Session::has('offer_data')) {
    //         Session::forget('offer_data');
    //     }

    //     $rules = [
    //         'name_client' => 'required|alpha',
    //         'phone' => 'required|unique:owner_info,phone|digits:10',
    //     ];
    //     $message = [
    //         'name_client.alpha' => 'يجب أن يتكون الأسم من حروف.',
    //         'name_client.required' => 'يجب أدخال الأسم.',
    //         'phone.required' => 'يجب إدخال رقم الهاتف.',
    //         'phone.unique' => 'هذا الرقم موجود مسبقا.',
    //         'phone.digits' => 'يجب أن يتكون من 10 أرقام.',
    //     ];

    //     if ($request->state_client == 'old') {
    //         $rules = [
    //             'phone' => 'required|exists:owner_info,phone|digits:10',
    //         ];
    //         $message = [
    //             'phone.required' => 'يجب إدخال رقم الهاتف.',
    //             'phone.exists' => 'هذا الرقم غير موجود .',
    //             'phone.digits' => 'يجب أن يتكون من 10 أرقام.',
    //         ];
    //     }

    //     $validator = Validator::make($request->all(), $rules, $message);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'state' => '400',
    //             'errors' => $validator->messages()
    //         ]);
    //     } else {
    //         if ($request->state_client == 'new') {
    //             $request->session()->put('offer_data', array(
    //                 'state_client' => $request->state_client,
    //                 'name_client' => $request->name_client,
    //                 'phone' => $request->phone,
    //                 'ask' => $request->client_offer_counter,
    //             ));
    //         } else {
    //             $request->session()->put('offer_data', array(
    //                 'state_client' => $request->state_client,
    //                 'phone' => $request->phone,
    //                 'ask' => $request->client_offer_counter_old,
    //             ));
    //         }

    //         return response()->json([
    //             'state' => '200',
    //             'message' => 'save data to session'
    //         ]);
    //     }
    // }


    public function step_four_city(Request $request)
    {

        $region = region::select('id', 'name')->where('city_id', $request->id_city)->get();
        $data = [];
        $i = 0;
        $data[$i] = '<option value="0" selected disabled>حدد المنطقة</option>';
        $i++;

        foreach ($region as $key => $row) {
            $data[$i] = "<option value=$row->id>$row->name</option>";
            $i++;
        }

        //    "<option value='. $row['id'].'>'. $row->name .'</option>" ;

        return response()->json([
            'region' => $data
        ]);
    }


    public function step_final(Request $request)
    {
        DB::transaction(function () use ($request): void {
                     
                $client_id =  $this->office_client($request);
                $model_id  =  $this->offer_details($request);
                $offer_id  =  $this->offer_store($request ,$model_id ,$client_id);
                $this->offer_image($request,$offer_id);
        });
        return response()->json([
            'state' => 200
        ]);

     
    }


    public function  office_client($request)
    {

        $client = office_clients::where('phone', $request->phone_client)->where('name', $request->name_owner)->select('id')->get();

        if ($client->count() == 0) {
            $new_client = office_clients::create([
                'name' => $request->name_owner,
                'phone' => $request->phone_client,
                'office_account_id' => Auth::guard('office')->user()->id
            ]);
            return $new_client['id'];
        } else {
            return 1;
        }
    }


    public function  offer_details($request)
    {

        $test = '';
        $data = array();

        $details = [
            'apartment' => [
                'document_type', 'age', 'area', 'bathrooms', 'rooms', 'floor', 'furnished', 'price',
                'title', 'description', 'extra_features', 'pyment_method', 'point', 'lat', 'lng'
            ],
            'houses' => [
                'document_type', 'age', 'area', 'area_land', 'bathrooms', 'rooms', 'floor', 'furnished', 'price',
                'title', 'description', 'extra_features', 'pyment_method', 'point', 'lat', 'lng'
            ],
            'villas_palaces' => [
                'document_type',  'age', 'wings', 'area', 'area_land', 'bathrooms', 'rooms', 'floor', 'furnished', 'price',
                'title', 'description', 'extra_features', 'pyment_method', 'point', 'lat', 'lng'
            ],
            'lands' => [
                'document_type', 'area_land', 'price',
                'title', 'description', 'extra_features', 'pyment_method', 'point', 'lat', 'lng'
            ],
            'commercial' => [
                'area', 'price',
                'title', 'description', 'extra_features', 'pyment_method', 'point', 'lat', 'lng'
            ],
        ];

        // model_name is name table in database  << for accsess table
        $model_name = 'App\Model' . $request->section;
        $section = substr($request->section, 1);

        foreach ($details[$section] as $row) {
            if ($row == 'extra_features' || $row == 'pyment_method') {
                $data[$row] = array($request->$row);
            } else {
                $data[$row] = $request->$row;
            }
        }

        $model_info = $model_name::create($data);

        return $model_info['id'];
    }


    public function  offer_store($request, $model_id, $client_id)
    {

        $offer_info = offer_info::create([
            'model_name'  => substr($request->section, 1),
            'model_id'  => $model_id,
            'sold'  => 0,
            'number_offer'  => Str::upper(Str::random(2)) . rand(0, 100000),
            'views'  => 0,
            'state'  => $request->type_offer,
            'state_offer'  => 1,
            'office_account_id'  => Auth::guard('office')->user()->id,
            'office_info_id'  => Auth::guard('office')->user()->office_info_id,
            'region_id'  => $request->region,
            'office_client_id'  => $client_id,
        ]);

        return  $offer_info->id;
    }

    public function  offer_image($request, $offer_id)
    {

        if ($request->hasFile('image_uplode')) {
            $path = 'image/office';
            $files = $request->file('image_uplode');
            $flag = false;

            foreach ($files as $file) {

                $file_name = time() . '_' . $file->getClientOriginalName();

                $image =  images::create([
                    'model_id' => $offer_id,
                    'model_name' => 'offer_info',
                    'name' => $file_name
                ]);

                $upload = $file->storeAs($path, $file_name, 'public');
                if($upload){
                    $flag =true;
                }
            }
           if($flag){
            return 200 ;
           }else{
            return 404 ;
           }
        }
    }










    public function check_step_one(step_one_validation $request)
    {

        $result = owner_info::where('phone', $request->phone)->where('name', $request->name_owner)->get();

        if (!$result) {
            owner_info::create([
                'name' => $request->name_owner,
                'phone' => $request->phone
            ]);
        }

        if (Session::has('offer_data')) {
            Session::forget('offer_data');
        }
        $request->session()->put('offer_data', array(
            'name' => $request->name_owner,
            'phone' => $request->phone,
            'type_offer' => $request->type_offer
        ));

        return redirect()->route('offers.step-two');
    }


    public function show_step_two()
    {
        //Session::put('offer_data',array_merge(Session::get('offer_data'),array('test','123456')) )  ;
        // return  Session::get('offer_data');

        $type_offer = Session::get('offer_data.type_offer');



        return view('office.offers.step-two', compact('type_offer'));
    }

    public function check_step_two(Request $request)
    {
        if ($request->hasFile('pic')) {
            return 'good';
        }
        //   return $request->file('pic');
    }
}
