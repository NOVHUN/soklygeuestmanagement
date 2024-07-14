<?php

namespace App\Http\Requests;

use App\Models\Promotion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdatePromotionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('promotion_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
            ],
            'discount_type' => [
                'required',
                'in:' . implode(',', Arr::pluck(Promotion::DISCOUNT_TYPE_RADIO, 'value')),
            ],
            'discount_value' => [
                'numeric',
                'required',
            ],
            'start_date' => [
                'date_format:' . config('project.datetime_format'),
                'required',
            ],
            'end_date' => [
                'date_format:' . config('project.datetime_format'),
                'required',
            ],
            'status' => [
                'required',
                'in:' . implode(',', Arr::pluck(Promotion::STATUS_RADIO, 'value')),
            ],
            'image_url' => [
                'array',
                'nullable',
            ],
            'image_url.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
