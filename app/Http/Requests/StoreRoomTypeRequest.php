<?php

namespace App\Http\Requests;

use App\Models\RoomType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRoomTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_type_create');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'max:255',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
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
