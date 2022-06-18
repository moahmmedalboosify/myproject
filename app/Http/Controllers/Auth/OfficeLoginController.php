<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Model\office_Account;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\office\auth\loginValidation;
use App\Model\code_active;
use App\Model\office_info;

class OfficeLoginController extends Controller
{

  
       Public function show_login(){  
         
           return view('auth.officelogin');
       }


       Public function login(Request $request){ 

     
        $this->validate($request, [
            'email'   => 'required|email|exists:office_account,email',
            'password' => 'required|min:6'
        ], [
            'email.exists' => 'البيانات غير مطابقة',
            'password.required' => 'مطلوب أدخالة كلمة المرور',
            'password.min' => 'كلمة المرور لا تقل عن 6 أحرف '
        ]);

        if(Auth::guard('office')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('office.home');
        }
        return back()->withInput($request->only('email'))->withErrors(['password' => 'كلمة المرور غير صحيحة']);
       }


       public function logout(){

        Auth::guard('office')->logout();
        Session::flush();   
        return redirect()->route('office.show.login');
       }


       
       public function  show_subscripe($id){
       
             $id =$id ;
           return view('office.subscripe.subscribe',compact('id'));
       }


       public function  check_code_subscripe(Request $request){

     
           $active = code_active::where('code',$request->code)->get();

            if($active->count() > 0){
               $office = office_info::where('id',$request->id)->first();
               $office->state =1;
               $office->save();

                return response()->json([
                    'state' => 200 ,
                    'message' => 'تم   تفعيل المكتب  بنجاح'
                ]);

            }else{

                return response()->json([
                    'state' => 400 ,
                    'message' => 'رمز التحقق غير صالح'
                ]);
            }


       }

       public function   test(){
           dd('test');
       }

       

    

}
