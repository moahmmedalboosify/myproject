<?php

namespace App\Http\Controllers\Office\requests;

use App\Model\client;
use Illuminate\Http\Request;
use App\Model\preview_request;
use App\Mail\office\request_send;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class previewController extends Controller
{


    public function index(Request $request){
        
     
            $data =preview_request::with('offer')->where('office_info_id',Auth::guard('office')->user()->office_info_id)->orderBy('id', 'DESC')->paginate(5);

        

        foreach($data as $row){
          
            $row['phone'] =client::select('phone','email','name')->find($row->client_id)->toArray() ;
            
        }


        if($request->ajax()){
            return view('office.requests.preview_request_pagination', compact('data'))->render() ;

        }else{
            return view('office.requests.preview_request', compact('data'));  

        }

    }




    public function chang_state_request(Request $request){

  

        $data =preview_request::find($request->id);
        if($data){

            $data->state = 'تم التواصل مع الزبون' ;
          
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


    public function delete_request($id){
        $data =preview_request::find($id);
        
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
