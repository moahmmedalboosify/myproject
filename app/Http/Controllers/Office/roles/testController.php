<?php

namespace App\Http\Controllers\Office\roles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class testController extends Controller
{
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
       
            'course'=>'required|max:191',
            'email'=>'required|email|max:191',
            'phone'=>'required|max:10|min:10',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
           
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
        }
    }
}
