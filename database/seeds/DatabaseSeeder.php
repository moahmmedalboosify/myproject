<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(citySeeder::class);
         $this->call(office_infoSeeder::class);
         $this->call(office_accountSeeder::class);
    }
}
