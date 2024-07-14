<?php

return [
    'userManagement' => [
        'title'          => 'គ្រប់គ្រងអ្នកប្រើប្រាស់',
        'title_singular' => 'គ្រប់គ្រងអ្នកប្រើប្រាស់',
    ],
    'permission' => [
        'title'          => 'ការអនុញ្ញាត',
        'title_singular' => 'ការអនុញ្ញាត',
        'fields'         => [
            'id'                => 'លេខ',
            'id_helper'         => ' ',
            'title'             => 'ចំណងជើង',
            'title_helper'      => ' ',
            'created_at'        => 'បង្កើតដោយ',
            'created_at_helper' => ' ',
            'updated_at'        => 'កែប្រែដោយ',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'លុបដោយ',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'តួនាទី',
        'title_singular' => 'តួនាទី',
        'fields'         => [
            'id'                 => 'លេខ',
            'id_helper'          => ' ',
            'title'              => 'ចំណងជើង',
            'title_helper'       => ' ',
            'permissions'        => 'ការអនុញ្ញាត',
            'permissions_helper' => ' ',
            'created_at'         => 'បង្កើតដោយ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'កែប្រែដោយ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'លុបដោយ',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'អ្នកប្រើប្រាស់',
        'title_singular' => 'អ្នកប្រើប្រាស់',
        'fields'         => [
            'id'                           => 'លេខ',
            'id_helper'                    => ' ',
            'name'                         => 'ឈ្មោះ',
            'name_helper'                  => ' ',
            'email'                        => 'អ៊ីម៉ែល',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'អ៊ីមែលបានផ្ទៀងផ្ទាត់ដោយ',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'ពាក្យសម្ងាត់',
            'password_helper'              => ' ',
            'roles'                        => 'តួនាទី',
            'roles_helper'                 => ' ',
            'remember_token'               => 'ចងចាំ Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'បង្កើតដោយ',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'កែប្រែដោយ',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'លុបដោយ',
            'deleted_at_helper'            => ' ',
            'phone'                        => 'ទូស័ព្ទ',
            'phone_helper'                 => ' ',
            'national_id_image_url'        => 'តំណភ្ជាប់ឯកសារអត្តសញ្ញាណបន',
            'national_id_image_url_helper' => ' ',
            'profile_image_url'            => 'តំណភ្ជាប់ប្រវត្តរូប',
            'profile_image_url_helper'     => ' ',
        ],
    ],
    'expenseManagement' => [
        'title'          => 'របាយការណ៍ការហិរញវត្ថុ',
        'title_singular' => 'របាយការណ៍ការហិរញវត្ថុ',
    ],
    'expenseCategory' => [
        'title'          => 'ប្រភេទចំណាយ',
        'title_singular' => 'ប្រភេទចំណាយ',
        'fields'         => [
            'id'                => 'លេខ',
            'id_helper'         => ' ',
            'name'              => 'ឈ្មោះ',
            'name_helper'       => ' ',
            'created_at'        => 'បង្កើតដោយ',
            'created_at_helper' => ' ',
            'updated_at'        => 'កែប្រែដោយ',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'លុបដោយ',
            'deleted_at_helper' => ' ',
        ],
    ],
    'incomeCategory' => [
        'title'          => 'ប្រភេទនៃចំណូល',
        'title_singular' => 'ប្រភេទនៃចំណូល',
        'fields'         => [
            'id'                => 'លេខ',
            'id_helper'         => ' ',
            'name'              => 'ប្រភេទនៃចំណូល',
            'name_helper'       => ' ',
            'created_at'        => 'បង្កើតដោយ',
            'created_at_helper' => ' ',
            'updated_at'        => 'កែប្រែដោយ',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'លុបដោយ',
            'deleted_at_helper' => ' ',
        ],
    ],
    'expense' => [
        'title'          => 'ចំណាយ',
        'title_singular' => 'ចំណាយ',
        'fields'         => [
            'id'                      => 'លេខ',
            'id_helper'               => ' ',
            'expense_category'        => 'ប្រភេទនៃចំណាយ',
            'expense_category_helper' => ' ',
            'entry_date'              => 'កាលបរិច្ឆេទចំណាយ',
            'entry_date_helper'       => ' ',
            'amount'                  => 'តម្លៃ',
            'amount_helper'           => ' ',
            'description'             => 'ការបរិយាយ',
            'description_helper'      => ' ',
            'created_at'              => 'បង្កើតដោយ',
            'created_at_helper'       => ' ',
            'updated_at'              => 'កែប្រែដោយ',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'លុបដោយ',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'income' => [
        'title'          => 'ចំណូល',
        'title_singular' => 'ចំណូល',
        'fields'         => [
            'id'                     => 'លេខ',
            'id_helper'              => ' ',
            'income_category'        => 'ប្រភេទនៃចំណូល',
            'income_category_helper' => ' ',
            'entry_date'             => 'កាលបរិច្ឆេទ​ចំណូល',
            'entry_date_helper'      => ' ',
            'amount'                 => 'តម្លៃ',
            'amount_helper'          => ' ',
            'description'            => 'ការបរិយាយ',
            'description_helper'     => ' ',
            'created_at'             => 'បង្កើតដោយ',
            'created_at_helper'      => ' ',
            'updated_at'             => 'កែប្រែដោយ',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'លុបដោយ',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'expenseReport' => [
        'title'          => 'របាយការណ៍ប្រចាំខែ',
        'title_singular' => 'របាយការណ៍ប្រចាំខែ',
        'reports'        => [
            'title'             => 'របាយការណ៍',
            'title_singular'    => 'របាយការណ៍',
            'incomeReport'      => 'របាយការណ៍ចំណូល',
            'incomeByCategory'  => 'ចំណូល',
            'expenseByCategory' => 'ចំណាយ',
            'income'            => 'ចំណូល',
            'expense'           => 'ចំណាយ',
            'profit'            => 'ចំណេញ',
        ],
    ],
    'roomManagement' => [
        'title'          => 'គ្រប់គ្រងបន្ទប់',
        'title_singular' => 'គ្រប់គ្រងបន្ទប់',
    ],
    'contentManagement' => [
        'title'          => 'គ្រប់គ្រងមាតិការ',
        'title_singular' => 'គ្រប់គ្រងមាតិការ',
    ],
    'contentCategory' => [
        'title'          => 'ប្រភេទ',
        'title_singular' => 'ប្រភេទ',
        'fields'         => [
            'id'                => 'លេខ',
            'id_helper'         => ' ',
            'name'              => 'ឈ្មោះ',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'បង្កើតដោយ',
            'created_at_helper' => ' ',
            'updated_at'        => 'កែប្រែដោយ',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'លុបដោយ',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentTag' => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                => 'លេខ',
            'id_helper'         => ' ',
            'name'              => 'ឈ្មោះនៃTag',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'created_at'        => 'បង្កើតដោយ',
            'created_at_helper' => ' ',
            'updated_at'        => 'កែប្រែដោយ',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'លុបដោយ',
            'deleted_at_helper' => ' ',
        ],
    ],
    'contentPage' => [
        'title'          => 'ទំព័រ',
        'title_singular' => 'ទំព័រ',
        'fields'         => [
            'id'                    => 'លេខ',
            'id_helper'             => ' ',
            'title'                 => 'ចំណងជើង',
            'title_helper'          => ' ',
            'category'              => 'ប្រភេទ',
            'category_helper'       => ' ',
            'tag'                   => 'Tags',
            'tag_helper'            => ' ',
            'page_text'             => 'អត្ថបទពេញ',
            'page_text_helper'      => ' ',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => ' ',
            'featured_image'        => 'រូបភាពក្បាលអត្ថបទ',
            'featured_image_helper' => ' ',
            'created_at'            => 'បង្កើតដោយ',
            'created_at_helper'     => ' ',
            'updated_at'            => 'កែប្រែដោយ',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'លុបដោយ',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'bookingManagement' => [
        'title'          => 'ការកក់និងការបង់ប្រាក់',
        'title_singular' => 'ការកក់និងការបង់ប្រាក់',
    ],
    'serviceManagement' => [
        'title'          => 'គ្រប់គ្រងសេវាកម្ម',
        'title_singular' => 'គ្រប់គ្រងសេវាកម្ម',
    ],
    'roomType' => [
        'title'          => 'គ្រប់គ្រងប្រភេទបន្ទប់',
        'title_singular' => 'គ្រប់គ្រងប្រភេទបន្ទប់',
        'fields'         => [
            'id'                 => 'លេខ',
            'id_helper'          => ' ',
            'type'               => 'ឈ្មោះប្រភេទ',
            'type_helper'        => ' ',
            'description'        => 'ការបរិយាយ',
            'description_helper' => ' ',
            'image_url'          => 'រូបភាពប្រភេទបន្ទប់',
            'image_url_helper'   => ' ',
            'created_at'         => 'បង្កើតដោយ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'កែប្រែដោយ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'លុបដោយ',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'room' => [
        'title'          => 'គ្រប់គ្រងបន្ទប់',
        'title_singular' => 'គ្រប់គ្រងបន្ទប់',
        'fields'         => [
            'id'                     => 'លេខ',
            'id_helper'              => ' ',
            'room_type'              => 'ប្រភេទបន្ទប់',
            'room_type_helper'       => ' ',
            'price_per_night'        => 'តម្លៃក្នុង១យប់',
            'price_per_night_helper' => ' ',
            'description'            => 'ការបរិយាយ',
            'description_helper'     => ' ',
            'image_url'              => 'រូបភាពបន្ទប់',
            'image_url_helper'       => ' ',
            'created_at'             => 'បង្កើតដោយ',
            'created_at_helper'      => ' ',
            'updated_at'             => 'កែប្រែដោយ',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'លុបដោយ',
            'deleted_at_helper'      => ' ',
            'max_people'             => 'ចំនួនមនុស្សអាចគេងបាន',
            'max_people_helper'      => ' ',
            'room_name'              => 'ឈ្មោះបន្ទប់',
            'room_name_helper'       => ' ',
        ],
    ],
    'roomMaintenance' => [
        'title'          => 'គ្រប់គ្រប់បន្ទប់ត្រូវថែទាំ',
        'title_singular' => 'គ្រប់គ្រប់បន្ទប់ត្រូវថែទាំ',
        'fields'         => [
            'id'                 => 'លេខ',
            'id_helper'          => ' ',
            'room'               => 'លេខបន្ទប់ត្រូវជុសជុល',
            'room_helper'        => ' ',
            'start_date'         => 'ពេលចាប់ផ្ដើម',
            'start_date_helper'  => ' ',
            'end_date'           => 'ពេលបញ្ចប់ថែទាំ',
            'end_date_helper'    => ' ',
            'description'        => 'ការបរិយាយ',
            'description_helper' => ' ',
            'created_at'         => 'បង្កើតដោយ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'កែប្រែដោយ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'លុបដោយ',
            'deleted_at_helper'  => ' ',
            'room_name'          => 'Room Name',
            'room_name_helper'   => ' ',
        ],
    ],
    'serviceType' => [
        'title'          => 'ប្រភេទនៃសេវាម្មបន្ថែម',
        'title_singular' => 'ប្រភេទនៃសេវាម្មបន្ថែម',
        'fields'         => [
            'id'                 => 'លេខ',
            'id_helper'          => ' ',
            'type'               => 'ឈ្មោះប្រភេទ',
            'type_helper'        => ' ',
            'description'        => 'ការបរិយាយ',
            'description_helper' => ' ',
            'image_url'          => 'រូបភាពប្រភេទសេវាកម្ម',
            'image_url_helper'   => ' ',
            'created_at'         => 'បង្កើតដោយ',
            'created_at_helper'  => ' ',
            'updated_at'         => 'កែប្រែដោយ',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'លុបដោយ',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'service' => [
        'title'          => 'គ្រប់គ្រងសេវាកម្ម',
        'title_singular' => 'គ្រប់គ្រងសេវាកម្ម',
        'fields'         => [
            'id'                  => 'លេខ',
            'id_helper'           => ' ',
            'service_type'        => 'ប្រភេទសេវាកម្ម',
            'service_type_helper' => ' ',
            'name'                => 'ឈ្មោះសេវាកម្ម',
            'name_helper'         => ' ',
            'description'         => 'ការបរិយាយ',
            'description_helper'  => ' ',
            'price'               => 'តម្លៃ',
            'price_helper'        => ' ',
            'image_url'           => 'រូបភាពសេវាកម្ម',
            'image_url_helper'    => ' ',
            'created_at'          => 'បង្កើតដោយ',
            'created_at_helper'   => ' ',
            'updated_at'          => 'កែប្រែដោយ',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'លុបដោយ',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'promotion' => [
        'title'          => 'គ្រប់គ្រងប្រម៉ូសិន',
        'title_singular' => 'គ្រប់គ្រងប្រម៉ូសិន',
        'fields'         => [
            'id'                    => 'លេខ',
            'id_helper'             => ' ',
            'code'                  => 'លេខសម្គាល់ប្រម៉ូសិន',
            'code_helper'           => ' ',
            'discount_type'         => 'ប្រភេទនៃការបញ្ចុះ',
            'discount_type_helper'  => ' ',
            'discount_value'        => 'តម្លៃបញ្ចុះតម្លៃ(%/$)',
            'discount_value_helper' => ' ',
            'start_date'            => 'ថ្ងៃចាប់ផ្ដើម',
            'start_date_helper'     => ' ',
            'end_date'              => 'ថ្ងៃបិទបញ្ចប់',
            'end_date_helper'       => ' ',
            'status'                => 'ស្ថានភាពនៃប្រុម៉ូសិន',
            'status_helper'         => ' ',
            'created_at'            => 'បង្កើតដោយ',
            'created_at_helper'     => ' ',
            'updated_at'            => 'កែប្រែដោយ',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'លុបដោយ',
            'deleted_at_helper'     => ' ',
            'image_url'             => 'អាប់ឡូតរូបប្រម៉ូសិន',
            'image_url_helper'      => ' ',
        ],
    ],
    'booking' => [
        'title'          => 'គ្រប់គ្រងការកក់',
        'title_singular' => 'គ្រប់គ្រងការកក់',
        'fields'         => [
            'id'                   => 'លេខ',
            'id_helper'            => ' ',
            'user'                 => 'លេខទូរស័ព្ទអតិថិជន',
            'user_helper'          => ' ',
            'total_price'          => 'តម្លៃសរុបនៃបង់ការបង់ប្រាក់',
            'total_price_helper'   => ' ',
            'status'               => 'ស្ថានភាពនៃការកក់',
            'status_helper'        => ' ',
            'promotion'            => 'បញ្ចុះតម្លៃ',
            'promotion_helper'     => ' ',
            'created_at'           => 'បង្កើតដោយ',
            'created_at_helper'    => ' ',
            'updated_at'           => 'កែប្រែដោយ',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'លុបដោយ',
            'deleted_at_helper'    => ' ',
            'customer_name'        => 'ឈ្មោះអតិថិជន',
            'customer_name_helper' => ' ',
            'phone_number'         => 'កក់ចំណាំ',
            'phone_number_helper'  => ' ',
        ],
    ],
    'bookingRoom' => [
        'title'          => 'ការកក់បន្ទប់',
        'title_singular' => 'ការកក់បន្ទប់',
        'fields'         => [
            'id'                           => 'លេខ',
            'id_helper'                    => ' ',
            'room'                         => 'លេខបន្ទប់',
            'room_helper'                  => ' ',
            'check_in_date'                => 'កក់ចូលស្នាក់នៅ',
            'check_in_date_helper'         => ' ',
            'check_out_date'               => 'កាលបរិច្ឆេទចេញ',
            'check_out_date_helper'        => ' ',
            'actual_check_in_date'         => 'កាលបរិច្ឆេទចូលស្នាក់ពិតប្រាកដ',
            'actual_check_in_date_helper'  => ' ',
            'actual_check_out_date'        => 'កាលបរិច្ឆេទពិនិត្យចេញពិតប្រាកដ',
            'actual_check_out_date_helper' => ' ',
            'price'                        => 'តម្លៃបន្ទប់',
            'price_helper'                 => ' ',
            'created_at'                   => 'បង្កើតដោយ',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'កែប្រែដោយ',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'លុបដោយ',
            'deleted_at_helper'            => ' ',
            'booking'                      => 'កក់ពីអតិថិជន',
            'booking_helper'               => ' ',
        ],
    ],
    'bookingService' => [
        'title'          => 'គ្រប់គ្រងសេវាកម្ម',
        'title_singular' => 'គ្រប់គ្រងសេវាកម្ម',
        'fields'         => [
            'id'                => 'លេខ',
            'id_helper'         => ' ',
            'booking'           => 'កក់ពីអតិថិជន',
            'booking_helper'    => ' ',
            'service'           => 'សេវាកម្ម',
            'service_helper'    => ' ',
            'quantity'          => 'ចំនួនឯកត្តា',
            'quantity_helper'   => ' ',
            'price'             => 'តម្លៃ',
            'price_helper'      => ' ',
            'created_at'        => 'បង្កើតដោយ',
            'created_at_helper' => ' ',
            'updated_at'        => 'កែប្រែដោយ',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'លុបដោយ',
            'deleted_at_helper' => ' ',
        ],
    ],
    'payment' => [
        'title'          => 'បង់ប្រាក់',
        'title_singular' => 'បង់ប្រាក់',
        'fields'         => [
            'id'                    => 'លេខ',
            'id_helper'             => ' ',
            'booking'               => 'ពីអ្នកកក់',
            'booking_helper'        => ' ',
            'amount'                => 'ទឹកប្រាក់',
            'amount_helper'         => ' ',
            'payment_date'          => 'កាលបរិច្ឆេទបង់ប្រាក់',
            'payment_date_helper'   => ' ',
            'receipt_image'         => 'វិក័យបត្របង់ប្រាក់',
            'receipt_image_helper'  => ' ',
            'status'                => 'ស្ថានភាព',
            'status_helper'         => ' ',
            'payment_type'          => 'ប្រភេទនៃការបង់ប្រាក់',
            'payment_type_helper'   => ' ',
            'payment_method'        => 'វិធីសាសាស្រ្តបង់ប្រាក់',
            'payment_method_helper' => ' ',
            'processed_by'          => 'ធ្វើបញ្ជីដោយ',
            'processed_by_helper'   => ' ',
            'created_at'            => 'បង្កើតដោយ',
            'created_at_helper'     => ' ',
            'updated_at'            => 'កែប្រែដោយ',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'លុបដោយ',
            'deleted_at_helper'     => ' ',
        ],
    ],

];
