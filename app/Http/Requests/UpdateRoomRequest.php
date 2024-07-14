<?php

namespace App\Http\Requests;

use App\Models\Room;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_edit');
    }

    public function rules()
    {
        return [
            'room_type_id' => [
                'integer',
                'exists:room_types,id',
                'required',
            ],
            'room_name' => [
                'string',
                'max:255',
                'nullable',
            ],
            'price_per_night' => [
                'numeric',
                'required',
            ],
            'max_people' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
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
