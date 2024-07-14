<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:255',
                'required',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'roles.*.id' => [
                'integer',
                'exists:roles,id',
            ],
            'phone' => [
                'string',
                'max:20',
                'nullable',
            ],
            'national_id_image_url' => [
                'array',
                'nullable',
            ],
            'national_id_image_url.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'profile_image_url' => [
                'array',
                'nullable',
            ],
            'profile_image_url.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }
}
