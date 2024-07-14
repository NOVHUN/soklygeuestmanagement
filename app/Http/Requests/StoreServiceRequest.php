<?php

namespace App\Http\Requests;

use App\Models\Service;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('service_create');
    }

    public function rules()
    {
        return [
            'service_type_id' => [
                'integer',
                'exists:service_types,id',
                'required',
            ],
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'price' => [
                'numeric',
                'required',
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
