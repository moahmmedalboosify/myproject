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
use App\Model\preview_request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Model\private_request;
use Illuminate\Support\Facades\Validator;

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
            //هذا الجزء يستخدم في البحث عن عقار بمواصفات معينة 
            if(array_key_exists('search',$request->all())){
              $data = $this->get_data_search($request);    
            }else{
                $data = offer_info::where('state',$request->value)->with('office_infos')->inRandomOrder()->get();

            }
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
     
       //dd($data) ;

       if($request->ajax()){
        
        return view('client.fetch_ajax.offers_fetch',compact('offer_image','data','offer_details'))->render();

       }else{
        return view('client.offers',compact('offer_image','data','offer_details'));

       }
    }


    public function get_data_search($request){
        
        $data = 
        offer_info::when(request()->type_offer, function($query) {
                            $query->where('model_name', request()->type_offer);
                        })->
                        when(request()->state_offer, function($query) {
                            $query->where('state', request()->state_offer);
                        })->
                        when(request()->region, function($query) use($request) {
                            $query->where('region_id',$request->region);
                        })->
                        when(request()->price_max, function($query) use($request) {
                          
                            $query->where('price','<',$request->price_max);
                        })
                        ->get();
                        return $data ;

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



    public function  single_office(Request $request , $id){

 
         if($request->ajax()){
          
            $data = offer_info::where('office_info_id',$id)->where('state',$request->value)->with('office_infos')->get();
         }else{
            $data = offer_info::where('office_info_id',$id)->with('office_infos')->get();
         }
        
        $temp = office_info::where('id',$id)->with('regions.cities')->get()->toArray();

        $office= $this->get_offices( $temp);


        // // dd( $office) ;
        $offer_image = array() ; // save all image id offer in key and value name image ;
        $offer_details = array() ; // save all image id offer in key and value name image ;
    
        foreach( $data as  $row){
          
           $details =$this->view_offers_details($row->toArray());
           $offer_details[$row->id] = $details[0] ;
        
           $image =$this->get_image_offers($row->id);
          
 
           $offer_image[$row->id] = $image[0]['name'] ;
        }

        $this->rating($id,'office');

        if($request->ajax()){ 
          

            return view('client.fetch_ajax.office_single_offer',compact('office','offer_image','data','offer_details'))->render();

        }
       
         
        return view('client.office_single',compact('office','offer_image','data','offer_details'));

    }

    public function rating($id,$model){
        if($model == 'office'){
          $office = office_info::where('id',$id)->get();
      
           $office[0]->views =$office[0]->views +1;
           $office[0]->save();        
        }else{
            $offer = offer_info::where('id',$id)->get();
            $offer[0]->views+=1;
            $offer[0]->save(); 
        }
    }

    public function  view_offers_single_details($row){
        $model_name = App::make('\\App\\Model\\'.$row['model_name']);
        $model = $model_name::where('id',$row['model_id'])->get()->toArray();
        return   $model ;
    }

    public function  get_image_offers_single($id){
        return  images::where('model_id',$id)->where('model_name','offer_info')->select('name')->get()->toArray() ;
    }

    public function   view_offer_single($id){

    

        $data = offer_info::where('id',$id)->get();
        if( $data->count() >0){

            $offer_image = array() ; // save all image id offer in key and value name image ;
            $offer_details = array() ; // save all image id offer in key and value name image ;
            $temp = office_info::where('id',$data[0]->office_info_id)->with('regions.cities')->get()->toArray();

             $office= $this->get_offices($temp);
            
            foreach( $data as  $row){
                
                $details =$this->view_offers_single_details($row->toArray());
                $offer_details[$row->id] = $details[0] ;
            
                $image =$this->get_image_offers_single($row->id);

             
                $offer_image[$row->id] =$image;
    
            }


        // dd( $offer_details);
         $this->rating($id,'offer');
         
         return view('client.offer_single',compact('offer_image','data','offer_details','office'));

        }else{
            return  redirect()->route('home') ;
          
        }

       

    }



    public function refresh_header(){
        return view('client.layout_client.header')->render();
    }


    public function  send_preview(Request $request){
         
        if($request->ajax()){

            $client = preview_request::where('client_id',$request->id_client)->where('offer_info_id', $request->id_offer)->get() ;

            if($client->count()>0){
                return response()->json([
                    'state' => 404
                ]);
            }else{
                preview_request::create([
                    'state' => 'قيد التنفيذ',
                    'message' => $request->message,
                    'client_id' => $request->id_client ,
                    'offer_info_id' => $request->id_offer,
                    'office_info_id' => $request->id_office
                ]); 
    
                return response()->json([
                    'state' => 200
                ]);
            }
           


        }
    }



    public function  view_private_request(){
        return view('client.private_request');

    }

    public function  send_private_request(Request $request){

     
        

        $validator = Validator::make($request->all(),[
            'area_from' => 'required|max:7|min:2',
            'area_to' => 'required|max:7|min:2',
            'city' => 'required',
            'price_from' => 'required|max:10|min:3',
            'price_to' => 'required|max:10|min:3',
            'type' => 'required',
            'message' => 'required'
        ], [
          
            'city.required' => 'مطلوب إدخال  المدينة .',
            'area_from.required' => 'مطلوب إدخال المساحة من .',
            'area_to.required' => 'مطلوب إدخال المساحة الي.',
            'price_from.required' => 'مطلوب إدخال السعر من.',
            'price_to.required' => 'مطلوب إدخال السعر الي.',
            'type.required' => 'مطلوب إدخال نوع العقار .',
            'city.required' => 'مطلوب  تحديد المدينة .',
            'message.required' => ' مطلوب إدخال الوصف .',
            'area_from.max' => 'المساحة لايتعدي 7 أرقام .',
            'area_from.min' => 'المساحة لاتقل عن 2 أرقام .',
            'area_to.max' => 'المساحة لايتعدي 7 أرقام .',
            'area_to.min' => 'المساحة لاتقل عن 2 أرقام .',
            'price_from.max' => 'السعر لايتعدي 10 أرقام .',
            'price_from.min' => 'السعر لايقل عن 3 أرقام .',
            'price_to.max' => 'السعر لايتعدي 10 أرقام .',
            'price_to.min' => 'السعر لايقل 3 أرقام .',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'state'=>400,
                'message'=>$validator->messages()
            ]);
        }else{

            $city = city::where('name',$request->city)->select('id')->get()->toArray();

            $city =$city[0]['id'] ;


            $office = office_info::with('regions.cities')
            ->whereHas('regions', function($query) use($city) {
                
                $query->where('city_id',$city);
            })->get()->toArray(); 

            if(count($office) ==0){
            $office = office_info::select('id')->inRandomOrder()->limit(1)->get()->toArray();
            $office =    $office[0]['id'] ;
            }else{
                $office =  $office[0]['id'] ;
            }


           
            
            private_request::create([
                'type_request' => $request->type ,
                'state' => 'قيد التنفيذ',
                'city' => $request->city,
                'area_from' => $request->area_from ,
                'area_to' => $request->area_to ,
                'price_from' => $request->price_from ,
                'price_to' => $request->price_to ,
                'message' => $request->message ,
                'client_id' => $request->id_client ,
               'office_info_id' =>  $office  ,
            ]);

            return response()->json([
                'state'=>200,
                'message'=> ' تم إرسال الطلب بنجاح سيتم التواصل معكم.'
            ]);

         
    
        }
    }

    public function  my_requests($id){
   
      $priv =array();
      $prev =array();
       
       $private = private_request::where('client_id',$id)->with('offices')->get()->toArray();
 
       foreach( $private as $row){
        $row['type']='طلب خاص' ;
        array_push( $priv,$row) ;
       }

     
       $preview = preview_request::where('client_id',$id)->with('offices')->get()->toArray();
       foreach( $preview as $row){
        $row['type']='طلب معاينة' ;
        array_push( $prev,$row) ;
       }
       $data = array_merge($priv,$prev) ;
   

      // dd( $data ) ;
       return view('client.myrequests',compact('data'));

    }



    public function delete_requests($id ,Request $request){
     
        if($request->type =='طلب خاص'){

             private_request::where('id',$id)->delete();
             return response()->json([
                'state'=>200,
                'message'=> ' تم حذف الطلب بنجاح.'
            ]);

        }else if($request->type =='طلب معاينة'){
            preview_request::where('id',$id)->delete();

            return response()->json([
                'state'=>200,
                'message'=> ' تم حذف الطلب بنجاح.'
            ]);
        }else{
            return response()->json([
                'state'=>404,
                'message'=> ' هناك خطأ ما !! يرجي المحاولة لاحقا .'
            ]);
        }
    }


    public function  details_requests($id ,Request $request){
 
        if($request->type =='طلب خاص'){

            
            return response()->json([
               'state'=>200,
               'message'=> private_request::where('id',$id)->get()->toarray()
           ]);

       }else if($request->type =='طلب معاينة'){

           return response()->json([
               'state'=>200,
               'message'=> preview_request::where('id',$id)->get()->toarray()
           ]);

       }else{
           return response()->json([
               'state'=>404,
               'message'=> ' هناك خطأ ما !! يرجي المحاولة لاحقا .'
           ]);
       }


    }


    public function  search_advanced(Request $request){


        return response()->json([
            'state'=>200,
            'message'=> $request->all()
        ]);
    }

    
    
}


