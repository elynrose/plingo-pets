@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.requestCare.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-cares.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.pet') }}
                        </th>
                        <td>
                            {{ $requestCare->pet->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.zip_code') }}
                        </th>
                        <td>
                            {{ $requestCare->zip_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.details') }}
                        </th>
                        <td>
                            {{ $requestCare->details }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.start_date') }}
                        </th>
                        <td>
                            {{ $requestCare->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.start_time') }}
                        </th>
                        <td>
                            {{ $requestCare->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.end_date') }}
                        </th>
                        <td>
                            {{ $requestCare->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.end_time') }}
                        </th>
                        <td>
                            {{ $requestCare->end_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.booked_by') }}
                        </th>
                        <td>
                            {{ $requestCare->booked_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.user_rating') }}
                        </th>
                        <td>
                            {{ $requestCare->user_rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.user_review') }}
                        </th>
                        <td>
                            {!! $requestCare->user_review !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.pet_rating') }}
                        </th>
                        <td>
                            {{ $requestCare->pet_rating }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.pet_review') }}
                        </th>
                        <td>
                            {!! $requestCare->pet_review !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.credits') }}
                        </th>
                        <td>
                            {{ $requestCare->credits }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.closed') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $requestCare->closed ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.requestCare.fields.created_by') }}
                        </th>
                        <td>
                            {{ $requestCare->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.request-cares.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection