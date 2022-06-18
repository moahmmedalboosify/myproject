<?php

use  App\Model\office_info;
use Illuminate\Database\Seeder;

class office_infoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    

        
        office_info::create([
           'name_office' => 'الاعمار' , 
           'name_owner' => 'محمد' , 
           'email' => 'mohammed@ly' , 
           'phone' => '0910466559' , 
           'description' => 'نعمل علي راحة الزبون ,نوفر جميع العروض' , 
           'views' => '0' , 
           'state' => '1' , 
           'point' => 'جنزور السوق' , 
           'lat' => '52214' , 
           'lng' => '32514' , 
           'region_id' => '1' , 
        ]);

       


     
    }
}
