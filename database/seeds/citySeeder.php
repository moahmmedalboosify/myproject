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
        city::create([
            'name' => ' طرابلس '
        ]);
    }
}
