<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{


    public function index(){
        return view('client.about');
    }
    public function offers(){
        return view('client.property-single');
    }
}
