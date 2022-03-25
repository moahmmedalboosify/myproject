<?php

namespace App\Http\Controllers\Office\offers;

use App\Model\owner_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\office\offer\step_one_validation;

class offerController extends Controller
{






    public function show_step_one()
    {
        return view('office.offers.step-one');
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
