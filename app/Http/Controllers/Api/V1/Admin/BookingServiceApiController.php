<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingServiceRequest;
use App\Http\Requests\UpdateBookingServiceRequest;
use App\Http\Resources\Admin\BookingServiceResource;
use App\Models\Booking;
use App\Models\BookingService;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingServiceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('booking_service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookingServiceResource(BookingService::with(['booking', 'service'])->advancedFilter());
    }

    public function store(StoreBookingServiceRequest $request)
    {
        $bookingService = BookingService::create($request->validated());
        $bookingService->booking()->sync($request->input('booking.*.id', []));

        return (new BookingServiceResource($bookingService))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('booking_service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'booking' => Booking::get(['id', 'phone_number']),
                'service' => Service::get(['id', 'name']),
            ],
        ]);
    }

    public function show(BookingService $bookingService)
    {
        abort_if(Gate::denies('booking_service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookingServiceResource($bookingService->load(['booking', 'service']));
    }

    public function update(UpdateBookingServiceRequest $request, BookingService $bookingService)
    {
        $bookingService->update($request->validated());
        $bookingService->booking()->sync($request->input('booking.*.id', []));

        return (new BookingServiceResource($bookingService))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(BookingService $bookingService)
    {
        abort_if(Gate::denies('booking_service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new BookingServiceResource($bookingService->load(['booking', 'service'])),
            'meta' => [
                'booking' => Booking::get(['id', 'phone_number']),
                'service' => Service::get(['id', 'name']),
            ],
        ]);
    }

    public function destroy(BookingService $bookingService)
    {
        abort_if(Gate::denies('booking_service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bookingService->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
