<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'manage_items', 'display_name' => 'إدارة المنتجات والتصنيفات'],
            ['name' => 'manage_purchases', 'display_name' => 'إدارة المشتريات'],
            ['name' => 'manage_customers', 'display_name' => 'إدارة العملاء'],
            ['name' => 'pay_installments', 'display_name' => 'سداد الأقساط'],
            ['name' => 'view_activity_logs', 'display_name' => 'عرض سجل الأنشطة'],
            ['name' => 'manage_users_roles', 'display_name' => 'إدارة المستخدمين والصلاحيات'],
            ['name' => 'manage_sales', 'display_name' => 'إدارة المبيعات'],
        ];
        foreach ($permissions as $permission) {
            Permission::updateOrCreate([
                'name' => $permission['name'],
                'guard_name' => 'web',
            ], [
                'display_name' => $permission['display_name'],
            ]);
        }
    }
}
