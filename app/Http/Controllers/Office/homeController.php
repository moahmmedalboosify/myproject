<?php

namespace App\Http\Controllers\Office;

use App\Model\offer_info;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\office_info;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:office',['except' => ['logout']]);
    }
    public function index(){
        $count_offers  = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->count();
        $count_offers_sold  = offer_info::where('office_info_id',Auth::guard('office')->user()->office_info_id)->where('sold',1)->count(); ;
        $office = office_info::where('id',Auth::guard('office')->user()->office_info_id)->select('name_office')->get()->toArray();
    //     dd(  $office) ;

        return view('office.index',compact('count_offers','count_offers_sold','office'));
    }
}
