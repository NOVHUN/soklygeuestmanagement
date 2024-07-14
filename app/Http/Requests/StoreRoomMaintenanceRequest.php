<?php

namespace App\Http\Requests;

use App\Models\RoomMaintenance;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRoomMaintenanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('room_maintenance_create');
    }

    public function rules()
    {
        return [
            'room' => [
                'array',
            ],
            'room.*.id' => [
                'integer',
                'exists:rooms,id',
            ],
            'room_name' => [
                'string',
                'max:255',
                'required',
            ],
            'start_date' => [
                'date_format:' . config('project.date_format'),
                'required',
            ],
            'end_date' => [
                'date_format:' . config('project.date_format'),
                'nullable',
            ],
            'description' => [
                'string',
                'required',
            ],
        ];
    }
}
