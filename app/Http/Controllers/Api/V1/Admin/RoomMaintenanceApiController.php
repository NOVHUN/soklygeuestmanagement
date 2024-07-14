<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomMaintenanceRequest;
use App\Http\Requests\UpdateRoomMaintenanceRequest;
use App\Http\Resources\Admin\RoomMaintenanceResource;
use App\Models\Room;
use App\Models\RoomMaintenance;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoomMaintenanceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('room_maintenance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoomMaintenanceResource(RoomMaintenance::with(['room'])->advancedFilter());
    }

    public function store(StoreRoomMaintenanceRequest $request)
    {
        $roomMaintenance = RoomMaintenance::create($request->validated());
        $roomMaintenance->room()->sync($request->input('room.*.id', []));

        return (new RoomMaintenanceResource($roomMaintenance))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('room_maintenance_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'room' => Room::get(['id', 'description']),
            ],
        ]);
    }

    public function show(RoomMaintenance $roomMaintenance)
    {
        abort_if(Gate::denies('room_maintenance_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RoomMaintenanceResource($roomMaintenance->load(['room']));
    }

    public function update(UpdateRoomMaintenanceRequest $request, RoomMaintenance $roomMaintenance)
    {
        $roomMaintenance->update($request->validated());
        $roomMaintenance->room()->sync($request->input('room.*.id', []));

        return (new RoomMaintenanceResource($roomMaintenance))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(RoomMaintenance $roomMaintenance)
    {
        abort_if(Gate::denies('room_maintenance_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new RoomMaintenanceResource($roomMaintenance->load(['room'])),
            'meta' => [
                'room' => Room::get(['id', 'description']),
            ],
        ]);
    }

    public function destroy(RoomMaintenance $roomMaintenance)
    {
        abort_if(Gate::denies('room_maintenance_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roomMaintenance->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
