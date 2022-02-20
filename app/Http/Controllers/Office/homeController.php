<?php

namespace App\Http\Controllers\Office;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:office',['except' => ['logout']]);
    }
    public function index(){
        return view('office.index');
    }
}
