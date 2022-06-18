<?php

namespace App\Http\Controllers\client;

use stdClass;
use App\Model\city;
use App\Model\lands;
use App\Model\houses;
use App\Model\images;
use App\Model\apartment; 
use App\Model\commercial;
use App\Model\contact_us;
use App\Model\offer_info;
use App\Model\office_info;
use Illuminate\Http\Request;
use App\Model\villas_palaces;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index(){

        $data = offer_info::with('regions.cities','office_infos')->inRandomOrder()->limit(5)->get()->toArray();
        $office = office_info::with('regions.cities')->inRandomOrder()->limit(3)->get()->toArray();

        $offices= $this->get_offices( $office)  ;


       
        $data = $this->get_details($data) ;

   
        return view('client.index',compact('data','offices'));
    }


    public function get_details($data){

        $data_all= array();
        $data_sub= array();
       
        $data_model=array();

        foreach( $data as  $row){
           
  
             foreach( $row as $key => $item){
                $data_sub[$key] = $item  ;
             }

           

             $model_name = App::make('\\App\\Model\\'.$row['model_name']);
      
             $model = $model_name::where('id',$row['model_id'])->get()->toArray();
          
             foreach( $model as $index => $mod){
                foreach( $mod as $tt => $dd){
                    $data_sub[$tt] = $dd  ;
                }
                break ;
             }

             foreach( $this->get_images($row['id'])->toArray() as $im => $iamge){
             
                foreach( $iamge as $mm => $gg){
                    $data_sub['name_image'] = $gg  ;
                }
                break ;
             }

             array_push($data_all ,$data_sub) ;

             $data_sub= array() ;
         
            
        }

       
    
       return   $data_all ;
    }


    public function get_offices($data){

        $data_all= array();
        $data_sub= array();
       
    
        foreach( $data as  $row){
         
            foreach( $row as  $key => $item){

                $data_sub[ $key]=  $item;

            }
            foreach( images::where('model_id',$row['id'])->where('model_name','office_info')->select('name')->get()->toArray()as  $key => $item){
                
                foreach( $item as  $key => $qq){

                $data_sub[ $key]=  $qq;
                }

            
            }

            array_push($data_all ,$data_sub) ;

            $data_sub= array() ;
         
            
        }

        return $data_all ;
    }


    public function get_images($id){
        return  images::where('model_id',$id)->where('model_name','offer_info')->select('name')->limit(1)->get() ;
    }


    public function  view_offers(Request $request ){


        if($request->ajax()){
            $data = offer_info::where('state',$request->value)->with('office_infos')->inRandomOrder()->get();
        }else{
            $data = offer_info::with('office_infos')->inRandomOrder()->get();
        }

       $offer_image = array() ; // save all image id offer in key and value name image ;
       $offer_details = array() ; // save all image id offer in key and value name image ;
   
       foreach( $data as  $row){
         
          $details =$this->view_offers_details($row->toArray());
          $offer_details[$row->id] = $details[0] ;
       
          $image =$this->get_image_offers($row->id);
         

          $offer_image[$row->id] = $image[0]['name'] ;
       }
     

       if($request->ajax()){
        return view('client.fetch_ajax.offers_fetch',compact('offer_image','data','offer_details'))->render();

       }else{
        return view('client.offers',compact('offer_image','data','offer_details'));

       }
    }

    public function  view_offers_details($row){
        $model_name = App::make('\\App\\Model\\'.$row['model_name']);
        $model = $model_name::where('id',$row['model_id'])->select('price','title')->get()->toArray();
        return   $model ;
    }


    public function  get_image_offers($id){
        return  images::where('model_id',$id)->where('model_name','offer_info')->select('name')->inRandomOrder()->limit(1)->get()->toArray() ;
    }



    public function  search_simple(Request $request){

        return response()->json([
            'state' => $request->all()
        ]);

    }




    public function  view_contact(){
        return view('client.contact');

    }


    public function contact_send(Request $request){
   

        contact_us::create([
            'name' =>  $request->name ,
            'email' => $request->email,
            'subject' =>  $request->subject ,
            'message' =>  $request->message ,
            
        ]);
        return response()->json([
            'state' => 200,
            'message' => 'تم إرسال الطلب بنجاح ...سيتم التواصل معك في أقرب وقت.'
        ]);
    }





    public function  view_about(){
        return view('client.about');

    }

    public function  view_offices(){

      

        $office = office_info::with('regions.cities')->inRandomOrder()->get()->toArray();

        $offices= $this->get_offices( $office)  ;

        return view('client.offices',compact('offices'));

    }


    // not complate
    public function  search_offices(Request $request){


        if($request->ajax()){
            switch($request->type)
            { 

               
                case 'name_office' :
                    $office = office_info::where('name_office','like','%' . $request->name)->with('regions.cities')->inRandomOrder()->get()->toArray();
                    break ;
                case 'city_office' :
                    $city = 'زاوية المحجوب' ;
                   
               
                    $office = office_info::with('regions.cities')
                    ->whereHas('regions', function($query) use($city) {
                        
                        $query->where('city_id',1 )->where('city_id',1 );
                    })->get()->toArray();

                 

                break ;
                case 'all' :
                    $office = office_info::with('regions.cities')->inRandomOrder()->get()->toArray();
                    break ;
            }


        }
        if(count($office)>0){
            $offices= $this->get_offices( $office);
        }else{
            $offices='0' ;
        }

     


        return view('client.fetch_ajax.offices_fetch',compact('offices'))->render();





    }



    public function  single_office($id){

        return view('client.office_single');

    }

   

}


