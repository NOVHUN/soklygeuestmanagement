<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreBookingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('booking_create');
    }

    public function rules()
    {
        return [
            'user' => [
                'array',
            ],
            'user.*.id' => [
                'integer',
                'exists:users,id',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'customer_name' => [
                'string',
                'required',
            ],
            'total_price' => [
                'numeric',
                'nullable',
            ],
            'status' => [
                'required',
                'in:' . implode(',', Arr::pluck(Booking::STATUS_RADIO, 'value')),
            ],
            'promotion_id' => [
                'integer',
                'exists:promotions,id',
                'nullable',
            ],
        ];
    }
}
