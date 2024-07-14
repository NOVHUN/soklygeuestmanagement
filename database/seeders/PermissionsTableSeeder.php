<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 18,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 19,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 20,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 21,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 22,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 23,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 24,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 25,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 26,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 27,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 28,
                'title' => 'expense_create',
            ],
            [
                'id'    => 29,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 30,
                'title' => 'expense_show',
            ],
            [
                'id'    => 31,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 32,
                'title' => 'expense_access',
            ],
            [
                'id'    => 33,
                'title' => 'income_create',
            ],
            [
                'id'    => 34,
                'title' => 'income_edit',
            ],
            [
                'id'    => 35,
                'title' => 'income_show',
            ],
            [
                'id'    => 36,
                'title' => 'income_delete',
            ],
            [
                'id'    => 37,
                'title' => 'income_access',
            ],
            [
                'id'    => 38,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 39,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 40,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 41,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 42,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 43,
                'title' => 'room_management_access',
            ],
            [
                'id'    => 44,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 45,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 46,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 47,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 48,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 49,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 50,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 51,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 52,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 53,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 54,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 55,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 56,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 57,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 58,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 59,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 60,
                'title' => 'booking_management_access',
            ],
            [
                'id'    => 61,
                'title' => 'service_management_access',
            ],
            [
                'id'    => 62,
                'title' => 'room_type_create',
            ],
            [
                'id'    => 63,
                'title' => 'room_type_edit',
            ],
            [
                'id'    => 64,
                'title' => 'room_type_show',
            ],
            [
                'id'    => 65,
                'title' => 'room_type_delete',
            ],
            [
                'id'    => 66,
                'title' => 'room_type_access',
            ],
            [
                'id'    => 67,
                'title' => 'room_create',
            ],
            [
                'id'    => 68,
                'title' => 'room_edit',
            ],
            [
                'id'    => 69,
                'title' => 'room_show',
            ],
            [
                'id'    => 70,
                'title' => 'room_delete',
            ],
            [
                'id'    => 71,
                'title' => 'room_access',
            ],
            [
                'id'    => 72,
                'title' => 'room_maintenance_create',
            ],
            [
                'id'    => 73,
                'title' => 'room_maintenance_edit',
            ],
            [
                'id'    => 74,
                'title' => 'room_maintenance_show',
            ],
            [
                'id'    => 75,
                'title' => 'room_maintenance_delete',
            ],
            [
                'id'    => 76,
                'title' => 'room_maintenance_access',
            ],
            [
                'id'    => 77,
                'title' => 'service_type_create',
            ],
            [
                'id'    => 78,
                'title' => 'service_type_edit',
            ],
            [
                'id'    => 79,
                'title' => 'service_type_show',
            ],
            [
                'id'    => 80,
                'title' => 'service_type_delete',
            ],
            [
                'id'    => 81,
                'title' => 'service_type_access',
            ],
            [
                'id'    => 82,
                'title' => 'service_create',
            ],
            [
                'id'    => 83,
                'title' => 'service_edit',
            ],
            [
                'id'    => 84,
                'title' => 'service_show',
            ],
            [
                'id'    => 85,
                'title' => 'service_delete',
            ],
            [
                'id'    => 86,
                'title' => 'service_access',
            ],
            [
                'id'    => 87,
                'title' => 'promotion_create',
            ],
            [
                'id'    => 88,
                'title' => 'promotion_edit',
            ],
            [
                'id'    => 89,
                'title' => 'promotion_show',
            ],
            [
                'id'    => 90,
                'title' => 'promotion_delete',
            ],
            [
                'id'    => 91,
                'title' => 'promotion_access',
            ],
            [
                'id'    => 92,
                'title' => 'booking_create',
            ],
            [
                'id'    => 93,
                'title' => 'booking_edit',
            ],
            [
                'id'    => 94,
                'title' => 'booking_show',
            ],
            [
                'id'    => 95,
                'title' => 'booking_delete',
            ],
            [
                'id'    => 96,
                'title' => 'booking_access',
            ],
            [
                'id'    => 97,
                'title' => 'booking_room_create',
            ],
            [
                'id'    => 98,
                'title' => 'booking_room_edit',
            ],
            [
                'id'    => 99,
                'title' => 'booking_room_show',
            ],
            [
                'id'    => 100,
                'title' => 'booking_room_delete',
            ],
            [
                'id'    => 101,
                'title' => 'booking_room_access',
            ],
            [
                'id'    => 102,
                'title' => 'booking_service_create',
            ],
            [
                'id'    => 103,
                'title' => 'booking_service_edit',
            ],
            [
                'id'    => 104,
                'title' => 'booking_service_show',
            ],
            [
                'id'    => 105,
                'title' => 'booking_service_delete',
            ],
            [
                'id'    => 106,
                'title' => 'booking_service_access',
            ],
            [
                'id'    => 107,
                'title' => 'payment_create',
            ],
            [
                'id'    => 108,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 109,
                'title' => 'payment_show',
            ],
            [
                'id'    => 110,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 111,
                'title' => 'payment_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
