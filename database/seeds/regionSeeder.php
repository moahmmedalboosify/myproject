<?php

use App\Model\city;
use App\Model\region;
use Illuminate\Database\Seeder;

class regionSeeder extends Seeder
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


     $i=0 ;
        foreach($region as $key => $rows){
          $i++;
                foreach($rows as $index => $item){
                  region::create([
                      'name' => $item,
                      'city_id' => $i
                  ]);
                }
             
          
       }
        

    }
}
