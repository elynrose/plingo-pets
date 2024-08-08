<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRequestCareRequest;
use App\Http\Requests\StoreRequestCareRequest;
use App\Http\Requests\UpdateRequestCareRequest;
use App\Models\Pet;
use App\Models\RequestCare;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RequestCareController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('request_care_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestCares = RequestCare::with(['pet', 'booked_by', 'created_by'])->get();

        return view('admin.requestCares.index', compact('requestCares'));
    }

    public function create()
    {
        abort_if(Gate::denies('request_care_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pets = Pet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $booked_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requestCares.create', compact('booked_bies', 'created_bies', 'pets'));
    }

    public function store(StoreRequestCareRequest $request)
    {
        $requestCare = RequestCare::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $requestCare->id]);
        }

        return redirect()->route('admin.request-cares.index');
    }

    public function edit(RequestCare $requestCare)
    {
        abort_if(Gate::denies('request_care_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pets = Pet::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $booked_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requestCare->load('pet', 'booked_by', 'created_by');

        return view('admin.requestCares.edit', compact('booked_bies', 'created_bies', 'pets', 'requestCare'));
    }

    public function update(UpdateRequestCareRequest $request, RequestCare $requestCare)
    {
        $requestCare->update($request->all());

        return redirect()->route('admin.request-cares.index');
    }

    public function show(RequestCare $requestCare)
    {
        abort_if(Gate::denies('request_care_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestCare->load('pet', 'booked_by', 'created_by');

        return view('admin.requestCares.show', compact('requestCare'));
    }

    public function destroy(RequestCare $requestCare)
    {
        abort_if(Gate::denies('request_care_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestCare->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequestCareRequest $request)
    {
        $requestCares = RequestCare::find(request('ids'));

        foreach ($requestCares as $requestCare) {
            $requestCare->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('request_care_create') && Gate::denies('request_care_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RequestCare();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
