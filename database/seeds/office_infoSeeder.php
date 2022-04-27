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
           'description' => 'لايوجد' , 
           'image' => 'cool.png' , 
           'state' => '1' , 
           'location_lat' => '52214' , 
           'location_lng' => '32514' , 
           'city_id' => '1' , 

        ]);
    }
}
