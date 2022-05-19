<?php

namespace App\Http\Controllers\Office\offers;

use App\Model\city;
use office_accountSeeder;
use Illuminate\Http\Request;
use App\Model\office_clients;
use App\Http\Controllers\Controller;
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

        $city = city::select('id','name')->get();
        return view('office.offers.index',compact('city'));
    }

   
    public function step_one(Request $request)
    {


        // delete data from session becouse new step
        if(Session::has('offer_data')){
            Session::forget('offer_data') ;
        }

        $rules=[
                'name_client' => 'required|alpha',
                'phone' => 'required|unique:office_client,phone|digits:10',
        ];
        $message=[
                 'name_client.alpha' =>'يجب أن يتكون الأسم من حروف.',
                 'name_client.required' =>'يجب أدخال الأسم.',
                 'phone.required' =>'يجب إدخال رقم الهاتف.',
                 'phone.unique' =>'هذا الرقم موجود مسبقا.',
                 'phone.digits' =>'يجب أن يتكون من 10 أرقام.',
        ];
          
       if($request->state_client == 'old'){
                $rules=[
                    'phone' => 'required|exists:office_client,phone|digits:10',
                ];
                $message=[
                        'phone.required' =>'يجب إدخال رقم الهاتف.',
                        'phone.exists' =>'هذا الرقم غير موجود .',
                        'phone.digits' =>'يجب أن يتكون من 10 أرقام.',
                ];
        }

        $validator = Validator::make($request->all(),$rules,$message);

        if( $validator->fails()){
            return response()->json([
                'state' => '400',
                 'errors'=>$validator->messages()
            ]);
        }else{
            if($request->state_client == 'new'){
                $request->session()->put('offer_data', array(
                    'state_client' =>$request->state_client,
                    'name_client' =>$request->name_client,
                    'phone' => $request->phone ,
                ));
            }else{
                $request->session()->put('offer_data', array(
                    'state_client' =>$request->state_client,
                    'phone' => $request->phone ,
                ));
            }
            
            return response()->json([
                 'state' => '200',
                 'message'=>'save data to session'
            ]);
        }



    }


    public function step_four_city(Request $request)
    {

        $city = city::select('id','name')->where('id',$request->id_city)->with('region')->get()->toArray();

        return response()->json([
            'state' => '200',
            'city'=>$city
        ]);
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
        
        if(Session::has('offer_data')){
            Session::forget('offer_data');
        }
        $request->session()->put('offer_data', array(
            'name' =>$request->name_owner,
            'phone' => $request->phone ,
            'type_offer' => $request->type_offer 
        ));

        return redirect()->route('offers.step-two');
    }


    public function show_step_two()
    {
        //Session::put('offer_data',array_merge(Session::get('offer_data'),array('test','123456')) )  ;
       // return  Session::get('offer_data');
       
       $type_offer = Session::get('offer_data.type_offer');



       return view('office.offers.step-two',compact('type_offer'));   
    
    }

    public function check_step_two(Request $request)
    {
        if($request->hasFile('pic')){
            return 'good' ;
        }
    //   return $request->file('pic');
    }

}
