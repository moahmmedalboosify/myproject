<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $permissions = [

            'إدارة العقارات',
            'عرض العقارات',
            'إضافة عقار',
            'البحث عن عقار',
            'الصلاحيات',
            'قائمة المستخدمين',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',
            'اضافة صلاحية',
            'عرض صلاحية',
            'حذف صلاحية',
            'تعديل صلاحية',

        ];



        foreach ($permissions as $permission) {

      
      Permission::create(['guard_name' => 'office', 'name' => $permission]);

        }

    }
}
