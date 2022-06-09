<?php

namespace App\Http\Controllers\client;

use stdClass;
use App\Model\lands;
use App\Model\houses;
use App\Model\images;
use App\Model\apartment; 
use App\Model\commercial;
use App\Model\offer_info;
use Illuminate\Http\Request;
use App\Model\villas_palaces;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class indexController extends Controller
{
    public function index(){

        $data = offer_info::with('regions.cities','office_infos')->inRandomOrder()->limit(5)->get()->toArray();
       
       $data = $this->get_details($data) ;
       //dd($data);
      //dd($data);
        // foreach( $data as $key => $row){
        //     dd($row['regions']['cities']['name']);
           

        
        // }

     // }
       return view('client.index',compact('data'));
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

   


    public function get_images($id){
        return  images::where('model_id',$id)->where('model_name','offer_info')->select('name')->limit(1)->get() ;
    }

}
