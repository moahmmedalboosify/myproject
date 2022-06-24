<?php

namespace App\Http\Controllers\Office\reports;

use Carbon\Carbon;
use App\Model\offer_info;
use App\Model\office_info;
use Illuminate\Http\Request;
use App\Model\office_clients;
use App\Model\preview_request;
use App\Model\private_request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class reportOfferController extends Controller
{
    public function index(){
        $id_office_info =  Auth::guard('office')->user()->office_info_id;

        $client_office = office_clients::with('office_accounts')->whereHas('office_accounts', function($query) use($id_office_info) {
                
            $query->where('office_info_id',$id_office_info);
           })->count() ;
      


        $sold_offers = offer_info::where('sold',1)->where('office_info_id', $id_office_info)->count();


        $views_office =office_info::where('id',$id_office_info)->select('views')->first();
        
        

        $offers = offer_info::where('office_info_id',$id_office_info)->count();
        
       
        $data_now =Carbon::now()->format('Y-m-d ');
  

        $offers_day = offer_info::where('created_at','LIKE',"%".date('Y-m-d')."%")->count();
       
       
        $offers_week = offer_info::where('created_at','>',Carbon::parse($data_now)->subDays(7))->where('created_at','<', $data_now)->count();

        $offers_mount = offer_info::where('created_at','>',Carbon::parse($data_now)->subDays(30))->where('created_at','<', $data_now)->count();
        
     

        $request_all = array();
        $request_private =array();
        $request_preview =array();

        $priv =array();
        $prev =array();
        
        $private = private_request::where('office_info_id',$id_office_info)->get()->toArray();
    
        foreach( $private as $row){
            $row['type']='طلب خاص' ;
            array_push( $priv,$row) ;
        }

        
        $preview = preview_request::where('office_info_id',$id_office_info)->get()->toArray();
        foreach( $preview as $row){
            $row['type']='طلب معاينة' ;
            array_push( $prev,$row) ;
        }
        $request_all = array_merge($priv,$prev) ;
        $request_all =count($request_all ) ;




        $request_private =[
            'all' => count($private ) ,
            'process' => private_request::where('office_info_id',$id_office_info)->where('state','قيد التنفيذ')->count() ,
            'done' => private_request::where('office_info_id',$id_office_info)->where('state','تم التواصل مع الزبون')->count()
        ];

        $request_preview =[
            'all' => count($preview ) ,
            'process' => preview_request::where('office_info_id',$id_office_info)->where('state','قيد التنفيذ')->count() ,
            'done' => preview_request::where('office_info_id',$id_office_info)->where('state','تم التواصل مع الزبون')->count()
        ];


     
  



      

          
        return view('office.reports.report_offers',compact('request_preview','request_private','request_all','client_office','sold_offers','views_office','offers','offers_day','offers_week','offers_mount'));
    }
}
