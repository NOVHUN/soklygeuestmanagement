<?php

namespace App\Http\Requests;

use App\Models\BookingService;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBookingServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('booking_service_create');
    }

    public function rules()
    {
        return [
            'booking' => [
                'array',
            ],
            'booking.*.id' => [
                'integer',
                'exists:bookings,id',
            ],
            'service_id' => [
                'integer',
                'exists:services,id',
                'nullable',
            ],
            'quantity' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'price' => [
                'numeric',
                'nullable',
            ],
        ];
    }
}
