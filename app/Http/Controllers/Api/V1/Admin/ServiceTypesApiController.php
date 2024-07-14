<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceTypeRequest;
use App\Http\Requests\UpdateServiceTypeRequest;
use App\Http\Resources\Admin\ServiceTypeResource;
use App\Models\ServiceType;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServiceTypesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('service_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceTypeResource(ServiceType::advancedFilter());
    }

    public function store(StoreServiceTypeRequest $request)
    {
        $serviceType = ServiceType::create($request->validated());

        if ($media = $request->input('image_url', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $serviceType->id]);
        }

        return (new ServiceTypeResource($serviceType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create()
    {
        abort_if(Gate::denies('service_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [],
        ]);
    }

    public function show(ServiceType $serviceType)
    {
        abort_if(Gate::denies('service_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceTypeResource($serviceType);
    }

    public function update(UpdateServiceTypeRequest $request, ServiceType $serviceType)
    {
        $serviceType->update($request->validated());

        $serviceType->updateMedia($request->input('image_url', []), 'service_type_image_url');

        return (new ServiceTypeResource($serviceType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(ServiceType $serviceType)
    {
        abort_if(Gate::denies('service_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ServiceTypeResource($serviceType),
            'meta' => [],
        ]);
    }

    public function destroy(ServiceType $serviceType)
    {
        abort_if(Gate::denies('service_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['service_type_create', 'service_type_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new ServiceType();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
