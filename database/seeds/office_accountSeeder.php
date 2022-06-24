<?php
use  App\Model\office_account;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $user = office_account::create([
             'name' => 'محمد البوسيفي',
             'email' => 'mohammed@test',
             'password' => Hash::make('123456'),
             
             'state_account' => 1,
             'office_info_id'=> 1
        ]);

        $role = Role::create(['guard_name' => 'office', 'name' => 'مدير المكتب']);
        $permissions = Permission::where('guard_name','office')->pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);


       


      
    }
}
