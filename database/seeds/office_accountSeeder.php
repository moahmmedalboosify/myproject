<?php
use  App\Model\office\office_account;

use Illuminate\Database\Seeder;

class office_accountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        office_account::create([
             'email' => 'test@test',
             'password' => Hash::make('123456'),
             'role' => 'test',
             'state_account' => 1,
             'office_info_id'=> 1
        ]);
    }
}
