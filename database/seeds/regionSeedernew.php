<?php

use App\Model\city;
use App\Model\region;
use Illuminate\Database\Seeder;

class regionSeedernew extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region =[
            'طرابلس' =>['جنزور','السراج','غوط الشعال','السياحية','الدريبي','كشلاف','حي الأندلس','أبوسليم','طريق المطار','الهضبة','عين زارة','صلاح الدين'],
 
            'بنغازي' => ['الهواري','القوارشة','بوعطني','سيدي خليفة','قنفودة','فينيسيا','الطليحة','سيدي فرج','بودزيرة',' قاريونس','بوهديمة','الكويفية','السلماني'],
             
            'مصراته' => ['شارع طرابلس','طمينة','زاوية المحجوب','السكيرات','الغيران','المقاوبة','الرملة','9 يوليو'],
            ] ;
 
        //  $city = city::pluck('id','name')->all();
        $city =[
          'طرابلس' ,'بنغازي' ,'مصراته' ,'ترهونة' ,'الزاوية' ,'صبراته' ,'هون' ,'العزيزية' ,'السواني' ,'صرمان' ,'الخمس' ,'زليتن' ,
      ] ;
        $i=0;
        foreach($city as $city){
          $i =0 ;
         foreach($region as $key => $rows){
               if($city->name == $key){
                 foreach($rows as $row){
                   region::create([
                       'name' => $row,
                       'city_id' =>$city->id
                   ]);
                 }
               }
         }  
         $i++ ;  
        }
    }
}
