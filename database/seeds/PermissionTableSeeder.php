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

            'الرئيسية',

            'إدارة العقارات',
            'عرض العقارات',
            'إضافة عقار',
           'البحث عن عقار',

            'تقارير',
           ' تقارير العروض',
            'تقارير المستخدمين',

            'إدارة الطلبات',
            'طلبات المعاينة',
            'طلبات الخاصة',

            'المستخدمون',
           'قائمة المستخدمين',
           'الصلاحيات',

           'إعدادات',
            'عرض الحساب الشخصي',
            'معلومات المكتب',

          
           'عرض عقار',
            'تغيير حالة العقار تم البيع',
           'حذف عقار',

            'إرسال بريدالألكتروني إلي العميل',
            'حذف الطلب',
            'عرض البريد الألكتروني',

            'إضافة صلاحية',
            'عرض صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',

            'إضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم' 

        ];



        foreach ($permissions as $permission) {

      
         Permission::create(['guard_name' => 'office', 'name' => $permission]);

        }

    }
}
