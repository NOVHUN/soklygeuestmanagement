<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('payment_edit');
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
            'amount' => [
                'numeric',
                'required',
            ],
            'payment_date' => [
                'date_format:' . config('project.datetime_format'),
                'required',
            ],
            'receipt_image' => [
                'array',
                'nullable',
            ],
            'receipt_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'status' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Payment::STATUS_RADIO, 'value')),
            ],
            'payment_type' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Payment::PAYMENT_TYPE_RADIO, 'value')),
            ],
            'payment_method' => [
                'nullable',
                'in:' . implode(',', Arr::pluck(Payment::PAYMENT_METHOD_RADIO, 'value')),
            ],
            'processed_by' => [
                'array',
            ],
            'processed_by.*.id' => [
                'integer',
                'exists:users,id',
            ],
        ];
    }
}
