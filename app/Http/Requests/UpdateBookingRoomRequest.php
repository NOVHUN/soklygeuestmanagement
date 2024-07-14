<?php

namespace App\Http\Requests;

use App\Models\BookingRoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBookingRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('booking_room_edit');
    }

    public function rules()
    {
        return [
            'booking' => [
                'required',
                'array',
            ],
            'booking.*.id' => [
                'integer',
                'exists:bookings,id',
            ],
            'room' => [
                'required',
                'array',
            ],
            'room.*.id' => [
                'integer',
                'exists:rooms,id',
            ],
            'check_in_date' => [
                'date_format:' . config('project.datetime_format'),
                'required',
            ],
            'check_out_date' => [
                'date_format:' . config('project.datetime_format'),
                'required',
            ],
            'actual_check_in_date' => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
            'actual_check_out_date' => [
                'date_format:' . config('project.datetime_format'),
                'nullable',
            ],
            'price' => [
                'numeric',
                'required',
            ],
        ];
    }
}
