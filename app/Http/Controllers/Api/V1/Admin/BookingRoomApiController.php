<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRoomRequest;
use App\Http\Requests\UpdateBookingRoomRequest;
use App\Http\Resources\Admin\BookingRoomResource;
use App\Models\Booking;
use App\Models\BookingRoom;
use App\Models\Room;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingRoomApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('booking_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookingRoomResource(BookingRoom::with(['booking', 'room'])->advancedFilter());
    }

    public function store(StoreBookingRoomRequest $request)
    {
        $bookingRoom = BookingRoom::create($request->validated());
        $bookingRoom->booking()->sync($request->input('booking.*.id', []));
        $bookingRoom->room()->sync($request->input('room.*.id', []));

        return (new BookingRoomResource($bookingRoom))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('booking_room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'booking' => Booking::get(['id', 'phone_number']),
                'room'    => Room::get(['id', 'description']),
            ],
        ]);
    }

    public function show(BookingRoom $bookingRoom)
    {
        abort_if(Gate::denies('booking_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookingRoomResource($bookingRoom->load(['booking', 'room']));
    }

    public function update(UpdateBookingRoomRequest $request, BookingRoom $bookingRoom)
    {
        $bookingRoom->update($request->validated());
        $bookingRoom->booking()->sync($request->input('booking.*.id', []));
        $bookingRoom->room()->sync($request->input('room.*.id', []));

        return (new BookingRoomResource($bookingRoom))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(BookingRoom $bookingRoom)
    {
        abort_if(Gate::denies('booking_room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new BookingRoomResource($bookingRoom->load(['booking', 'room'])),
            'meta' => [
                'booking' => Booking::get(['id', 'phone_number']),
                'room'    => Room::get(['id', 'description']),
            ],
        ]);
    }

    public function destroy(BookingRoom $bookingRoom)
    {
        abort_if(Gate::denies('booking_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookingRoom->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
