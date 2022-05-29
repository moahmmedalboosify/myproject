<?php


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   

    public function run()
    {         
        $this->call(citySeeder::class);
        $this->call(regionSeeder::class);
         $this->call(office_infoSeeder::class);
         $this->call(PermissionTableSeeder::class);
         $this->call(office_accountSeeder::class);
    }
}
