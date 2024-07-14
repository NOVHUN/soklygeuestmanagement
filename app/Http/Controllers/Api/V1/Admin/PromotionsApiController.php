<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Http\Resources\Admin\PromotionResource;
use App\Models\Promotion;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PromotionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('promotion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PromotionResource(Promotion::advancedFilter());
    }

    public function store(StorePromotionRequest $request)
    {
        $promotion = Promotion::create($request->validated());

        if ($media = $request->input('image_url', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $promotion->id]);
        }

        return (new PromotionResource($promotion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('promotion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'discount_type' => Promotion::DISCOUNT_TYPE_RADIO,
                'status'        => Promotion::STATUS_RADIO,
            ],
        ]);
    }

    public function show(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PromotionResource($promotion);
    }

    public function update(UpdatePromotionRequest $request, Promotion $promotion)
    {
        $promotion->update($request->validated());

        $promotion->updateMedia($request->input('image_url', []), 'promotion_image_url');

        return (new PromotionResource($promotion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new PromotionResource($promotion),
            'meta' => [
                'discount_type' => Promotion::DISCOUNT_TYPE_RADIO,
                'status'        => Promotion::STATUS_RADIO,
            ],
        ]);
    }

    public function destroy(Promotion $promotion)
    {
        abort_if(Gate::denies('promotion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $promotion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['promotion_create', 'promotion_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new Promotion();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
