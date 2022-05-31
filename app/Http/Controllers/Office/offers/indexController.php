<?php

namespace App\Http\Controllers\Office\offers;

use App\Model\commercial;
use App\Model\offer_info;
use Illuminate\Http\Request;
use App\Model\office_clients;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class indexController extends Controller
{

    public function index()
    {
        $data = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->with('users')->orderBy('id', 'DESC')->paginate(5);
     
     

        return view('office.offers.index', compact('data'));
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
        $data = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->where('id',$id)
        ->with('users')->with('regions.cities')->with('clients')->orderBy('id', 'DESC')->paginate(5);
 
        $modal_name='' ;
        foreach($data as $row){
            $id= $row->model_id ;
            $model =$row->model_name ;
            $modal_name=$row->model_name ;
        }
        switch($model)
        {
            case('commercial'):
                $model = 'App\Model\commercial';
              break;
          case('land'):
            $model = 'App\Model\land';
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
            

        
        $test = $model::find($id);
        return view('office.offers.show_offer', compact('data','modal_name'));
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
