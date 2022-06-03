<?php

namespace App\Http\Controllers\Office\offers;

use App\Model\city;
use App\Model\commercial;
use App\Model\offer_info;
use Illuminate\Http\Request;
use App\Model\office_Account;
use App\Model\office_clients;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class indexController extends Controller
{

    public function index()
    {
        $data = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->with('user')->orderBy('id', 'DESC')->paginate(5);
        
        foreach( $data as $row){
            $user = office_Account::find($row->office_account_id) ;
        }

        
     
        return view('office.offers.index', compact('data','user'));
    }

  




    public function fetch_data(Request $request)
    {

        if($request->ajax()){
            $data = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->with('users')->orderBy('id', 'DESC')->paginate(5);
            return view('office.users.index_pagination', compact('data'))->render();
        }
    }


    public function view_offer_client_info_ajax(Request $request)
    {

        if($request->ajax()){
            $data = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->where('id',$request->id)
            ->with('users')->with('regions.cities')->with('clients')->orderBy('id', 'DESC')->paginate(5);
            return view('office.offers.fetch_ajax.client_info', compact('data')) ->render();
        }
    }


    public function view_offer($id)
    {
         
        $data = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->where('id',$id)->with('clients','user','regions')->find($id);
     
        
        $id= $data->model_id ;
        $model =$data->model_name ;
        $modal_name=$data->model_name ;
    

        switch($model)
        {
            case('commercial'):
                $model = 'App\Model\commercial';
              break;
          case('lands'):
            $model = 'App\Model\lands';
              break;
           case('apartment')  :
            $model = 'App\Model\apartment';
              break;
           case('houses'):
            $model = 'App\Model\houses';
              break ;  
           case('villas_palaces'):
            $model = 'App\Model\villas_palaces';
              break   ;
        }
            

        
        $sub_model = $model::find($id); 
   
        $city =city::select('name')->find($data->regions->city_id);
        
        return view('office.offers.show_offer', compact('data','modal_name','sub_model','city'));
    }

    // thw function process when edit offer type then enter new offer in new page  the function call in page show_offer  in action  $(document).on('change', '#type_offer', function(e) 
    public function edit_full_offer_ajax($id)
    {
  
        $data = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->where('id',$id)
        ->with('user')->with('regions')->with('clients')->orderBy('id', 'DESC')->get();
        $city = city::select('id', 'name')->get();
        return view('office.offers.edit_full_offer', compact('city','data'));
    }

    public function edit_full_offer_final_ajax(Request $request , $id)
    {
         

     
        DB::transaction(function () use ($request, $id): void {
            $model_old = 'App\Model'.$request->modal_name_offer;

            $model_old::where('id',$request->modal_id_offer)->delete();

       
            $model_new_id = $this->update_offer_details($request);
    
            $data = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->where('id',$id)->first();;
            $data->model_name =  substr($request->section, 1) ;
            $data->model_id =  $model_new_id;
            $data->region_id =  $request->region;
            $data->save();        
           
        });
      

        return response()->json([
            'state' => '200',
            'message' => 'the updata is complate'
        ]);

        // $data = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->where('id',$id)
        // ->with('users')->with('regions.cities')->with('clients')->orderBy('id', 'DESC')->get();

        // $city = city::select('id', 'name')->get();
        // return view('office.offers.edit_full_offer', compact('city','data'));
    }

    public function  update_offer_details($request)
    {

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



    public function edit_client_ajax(Request $request)
    {

        $rules = [
            'name' => 'required',
            'phone' => 'required|digits:10|unique:office_client,phone,'.$request->id,
        ];
        $message = [
            'name.required' => 'يجب أدخال الأسم.',
            'phone.required' => 'يجب إدخال رقم الهاتف.',
            'phone.unique' => 'هذا الرقم موجود مسبقا.',
            'phone.digits' => 'يجب أن يتكون من 10 أرقام.',
        ];

       

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json([
                'state' => '400',
                'errors' => $validator->messages()
            ]);
        }else{
            $office_client =office_clients::find($request->id);
            $office_client->name = $request->name;
            $office_client->phone =$request->phone;
            $office_client->save();
        }
       
    }


    public function edit_offer_info_ajax(Request $request){


        $office_client =offer_info::find($request->id);
        $office_client->state = $request->state;
        $office_client->state_offer =$request->state_offer;
        $office_client->save();

        return response()->json([
            'state' => 200
        ]);

    }

}