<?php

use App\Model\city;
use Illuminate\Database\Seeder;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $city =[
           'طرابلس' ,'بنغازي' ,'مصراته' ,'ترهونة' ,'الزاوية' ,'صبراته' ,'هون' ,'العزيزية' ,'السواني' ,'صرمان' ,'الخمس' ,'زليتن' ,
       ] ;

       foreach($city as $row){
           city::create([
               'name' =>$row
           ]);
       }
        

    }
}
