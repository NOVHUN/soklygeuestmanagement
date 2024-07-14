<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class DashboardApiController extends Controller
{
    public function index()
    {
        $stats0 = new ChartsService([
            'title'              => 'Total User',
            'chart_type'         => 'stats',
            'model'              => 'App\Models\User',
            'column_class'       => 'col-md-3',
            'footer_icon'        => 'date_range',
            'aggregate_function' => 'count',
            'aggregate_field'    => '',
            'footer_text'        => 'This week',
            'filter_by_field'    => 'created_at',
            'filter_by_period'   => 'week',
        ]);

        $stats1 = new ChartsService([
            'title'              => 'Total Booking',
            'chart_type'         => 'stats',
            'model'              => 'App\Models\Booking',
            'column_class'       => 'col-md-3',
            'footer_icon'        => 'date_range',
            'aggregate_function' => 'count',
            'aggregate_field'    => '',
            'footer_text'        => 'Last 7 days',
            'filter_by_field'    => 'created_at',
            'filter_by_period'   => 7,
        ]);

        $stats2 = new ChartsService([
            'title'              => 'Number of Room Booking',
            'chart_type'         => 'stats',
            'model'              => 'App\Models\BookingRoom',
            'column_class'       => 'col-md-3',
            'footer_icon'        => 'date_range',
            'aggregate_function' => 'count',
            'aggregate_field'    => '',
            'footer_text'        => 'Last 7 days',
            'filter_by_field'    => 'created_at',
            'filter_by_period'   => 7,
        ]);

        $stats3 = new ChartsService([
            'title'              => 'Number of Service booking',
            'chart_type'         => 'stats',
            'model'              => 'App\Models\BookingService',
            'column_class'       => 'col-md-3',
            'footer_icon'        => 'date_range',
            'aggregate_function' => 'count',
            'aggregate_field'    => '',
            'footer_text'        => 'Last 7 days',
            'filter_by_field'    => 'created_at',
            'filter_by_period'   => 7,
        ]);

        $line4 = new ChartsService([
            'title'              => 'Amount of Payment Booking',
            'chart_type'         => 'line',
            'model'              => 'App\Models\Payment',
            'group_by_field'     => 'payment_date',
            'group_by_period'    => 'day',
            'column_class'       => 'col-md-3',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'amount',
            'filter_by_field'    => 'created_at',
            'filter_by_period'   => 7,
        ]);

        $line5 = new ChartsService([
            'title'              => 'Amount of Imcome',
            'chart_type'         => 'line',
            'model'              => 'App\Models\Income',
            'group_by_field'     => 'entry_date',
            'group_by_period'    => 'week',
            'column_class'       => 'col-md-3',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'amount',
            'filter_by_field'    => 'created_at',
            'filter_by_period'   => 30,
        ]);

        $line6 = new ChartsService([
            'title'              => 'Amount of Expenes',
            'chart_type'         => 'line',
            'model'              => 'App\Models\Expense',
            'group_by_field'     => 'entry_date',
            'group_by_period'    => 'week',
            'column_class'       => 'col-md-3',
            'aggregate_function' => 'sum',
            'aggregate_field'    => 'amount',
            'filter_by_field'    => 'created_at',
            'filter_by_period'   => 30,
        ]);

        $line7 = new ChartsService([
            'title'              => 'Number of Room Manintenance',
            'chart_type'         => 'line',
            'model'              => 'App\Models\RoomMaintenance',
            'group_by_field'     => 'created_at',
            'group_by_period'    => 'week',
            'column_class'       => 'col-md-3',
            'aggregate_function' => 'count',
            'aggregate_field'    => '',
            'filter_by_field'    => 'created_at',
            'filter_by_period'   => 30,
        ]);

        $latest8 = new ChartsService([
            'title'            => 'Customer Last Register',
            'chart_type'       => 'latest',
            'model'            => 'App\Models\User',
            'column_class'     => 'col-md-6',
            'fields'           => ['name', 'email', 'phone', 'profile_image_url'],
            'limit'            => 5,
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $latest9 = new ChartsService([
            'title'            => 'Customer Last Booking',
            'chart_type'       => 'latest',
            'model'            => 'App\Models\Booking',
            'column_class'     => 'col-md-6',
            'fields'           => ['customer_name', 'phone_number'],
            'limit'            => 5,
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $latest10 = new ChartsService([
            'title'            => 'Last RoomBooking',
            'chart_type'       => 'latest',
            'model'            => 'App\Models\BookingRoom',
            'column_class'     => 'col-md-6',
            'fields'           => ['check_in_date', 'check_out_date', 'price'],
            'limit'            => 10,
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $latest11 = new ChartsService([
            'title'            => 'Last ServiceBooking',
            'chart_type'       => 'latest',
            'model'            => 'App\Models\BookingService',
            'column_class'     => 'col-md-6',
            'fields'           => ['quantity', 'price'],
            'limit'            => 10,
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 7,
        ]);

        $latest12 = new ChartsService([
            'title'            => 'Last Income',
            'chart_type'       => 'latest',
            'model'            => 'App\Models\Income',
            'column_class'     => 'col-md-6',
            'fields'           => ['entry_date', 'amount', 'description'],
            'limit'            => 10,
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 30,
        ]);

        $latest13 = new ChartsService([
            'title'            => 'Last Expenes',
            'chart_type'       => 'latest',
            'model'            => 'App\Models\Expense',
            'column_class'     => 'col-md-6',
            'fields'           => ['entry_date', 'amount', 'description'],
            'limit'            => 10,
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 30,
        ]);

        return response()->json(compact('stats0', 'stats1', 'stats2', 'stats3', 'line4', 'line5', 'line6', 'line7', 'latest8', 'latest9', 'latest10', 'latest11', 'latest12', 'latest13'));
    }
}
