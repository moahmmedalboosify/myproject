<?php

namespace App\Http\Controllers\Office\requests;

use App\Model\client;
use Illuminate\Http\Request;
use App\Model\private_request;
use App\Mail\office\request_send;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class privateRequestController extends Controller
{
    public function index(){
        $client_phone =0;
        $data =private_request::where('office_info_id',Auth::guard('office')->user()->office_info_id)->orderBy('id', 'DESC')->paginate(5);
        foreach($data as $row){
            $client_phone = client::find($row->client_id) ;
        }

        return view('office.requests.private_request', compact('data','client_phone'));  
    }


    public function chang_state_request(Request $request){

  

        $data =private_request::find($request->id);
        if($data){

            $data->state = 'تم التواصل مع الزبون' ;
            $data->message_user = $request->message ;
            $data->save();

            $this->send_email($request) ;

            return response()->json([
                'state' => '200',
                'message' => 'تم إرسال البريد الألكتروني بنجاح'
            ]);

        }else{
            return response()->json([
                'state' => '400',
                'message' => 'هناك خطأ ما ...حاول لاحقا.'
            ]);
        }
  

    }



    public function send_email($request)
    {
        $data = [
            'message' =>$request->message 
        ];
        $send =Mail::to($request->email)->send(new request_send($data));
       
         

      
      
    }


    public function fetch_private_request_ajax(Request $request)
    {

        if($request->ajax()){
            $data =private_request::where('office_info_id',Auth::guard('office')->user()->office_info_id)->orderBy('id', 'DESC')->paginate(5);
          
            foreach($data as $row){
                $client_phone = client::find($row->client_id) ;
            }
    
            return view('office.requests.private_request_pagination', compact('data','client_phone'))->render() ;
        }

    }

    public function show_email(Request $request , $id){

        if($request->ajax()){
            $data =private_request::select('message_user')->find($id);
            if($data){
                return response()->json([
                    'state' => '200',
                    'message' => $data->message_user
                ]);
            }else{
                return response()->json([
                    'state' => '400',
                    'message' => 'هناك خطأ ما ...حاول لاحقا.'
                ]); 
            }


        }

    }

    public function delete_email($id){
        $data =private_request::find($id);
        
        if($data){
            $data->delete() ;
            return response()->json([
                'state' => '200',
                'message' => 'تم حذف الطلب بنجاح'
            ]);
        }else{
            return response()->json([
                'state' => '400',
                'message' => 'هناك خطأ ما ...حاول لاحقا.'
            ]); 
        }

    }
    

    
     
  
}
