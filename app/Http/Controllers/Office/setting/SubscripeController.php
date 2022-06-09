<?php

namespace App\Http\Controllers\Office\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscripeController extends Controller
{
     public function index(){
         return view('office.subscribe.subscribe');
     }
}
