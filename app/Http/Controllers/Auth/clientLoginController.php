<?php

namespace App\Http\Controllers\Auth;

use App\Model\client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class clientLoginController extends Controller
{
    Public function registration  (Request $request){ 

 
        $validator = Validator::make($request->all(),[
            'name'   => 'required',
            'password' => 'required|min:3',
            'phone' => 'required|min:10|unique:client,phone',
            'email' => 'required|email|unique:client,email'
        ], [
            'name.required' => ' مطلوب إدخال الأسم.',
            'phone.required' => ' مطلوب إدخال رقم الهاتف.',
            'phone.unique' => 'رقم الهاتف موجود مسبقا.',
            'phone.min' => 'رقم الهاتف لايتعدي 10 أرقام .',
            'password.required' => 'مطلوب إدخال رقم الهاتف.',
            'password.min' => 'كلمة المرور لا تقل عن 6 أحرف ',
            'email.required' => 'مطلوب إدخال البريد الألكتروني .',
            'email.email' => 'مطلوب إدخال الصيغة الصحيحة للبريد الألكتروني .',
            'email.unique' => 'البريد الألكتروني موجود مسبقا .',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'state'=>400,
                'message'=>$validator->messages()
            ]);
        }else{
           client::create([
               'name' => $request->name ,
               'email' =>   $request->email,
               'phone' =>   $request->phone,
               'password' =>  Hash::make($request->password)
           ]);
           return response()->json([
            'state'=>200,
            'message'=>'تم إنشاء الحساب بنجاح'
        ]);
          
        }




     }


     
     Public function loginClient(Request $request){ 
 

        $validator = Validator::make($request->all(),[
            'password' => 'required|min:3',
            'email' => 'required|email'
        ], [
          
            'password.required' => 'مطلوب إدخال رقم الهاتف.',
            'password.min' => 'كلمة المرور لا تقل عن 6 أحرف ',
            'email.required' => 'مطلوب إدخال البريد الألكتروني .',
            'email.email' => 'مطلوب إدخال الصيغة الصحيحة للبريد الألكتروني .',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'state'=>400,
                'message'=>$validator->messages()
            ]);
        }else{
 
            if(Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password])){
                return response()->json([
                    'state'=>200,
                ]);
            }else{
                return response()->json([
                    'state'=>404,
                    'message'=>'البيانات غير مطابقة'
                ]);
            }
    
        }

      

     
    }


    Public function logoutClient(Request $request){   
        Auth::guard('client')->logout();
        Session::flush();   
        return redirect()->route('home');
    }
}
