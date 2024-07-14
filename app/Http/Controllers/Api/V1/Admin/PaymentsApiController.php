<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Resources\Admin\PaymentResource;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PaymentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentResource(Payment::with(['booking', 'processedBy'])->advancedFilter());
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->validated());
        $payment->booking()->sync($request->input('booking.*.id', []));
        $payment->processedBy()->sync($request->input('processed_by.*.id', []));
        if ($media = $request->input('receipt_image', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $payment->id]);
        }

        return (new PaymentResource($payment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'booking'        => Booking::get(['id', 'phone_number']),
                'processed_by'   => User::get(['id', 'email']),
                'status'         => Payment::STATUS_RADIO,
                'payment_type'   => Payment::PAYMENT_TYPE_RADIO,
                'payment_method' => Payment::PAYMENT_METHOD_RADIO,
            ],
        ]);
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentResource($payment->load(['booking', 'processedBy']));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->validated());
        $payment->booking()->sync($request->input('booking.*.id', []));
        $payment->processedBy()->sync($request->input('processed_by.*.id', []));
        $payment->updateMedia($request->input('receipt_image', []), 'payment_receipt_image');

        return (new PaymentResource($payment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new PaymentResource($payment->load(['booking', 'processedBy'])),
            'meta' => [
                'booking'        => Booking::get(['id', 'phone_number']),
                'processed_by'   => User::get(['id', 'email']),
                'status'         => Payment::STATUS_RADIO,
                'payment_type'   => Payment::PAYMENT_TYPE_RADIO,
                'payment_method' => Payment::PAYMENT_METHOD_RADIO,
            ],
        ]);
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['payment_create', 'payment_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new Payment();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
