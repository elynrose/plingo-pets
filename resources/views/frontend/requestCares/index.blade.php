@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('request_care_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.request-cares.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.requestCare.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.requestCare.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-RequestCare">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.pet') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.zip_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.details') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.start_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.start_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.end_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.end_time') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.booked_by') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.user_rating') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.pet_rating') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.credits') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.closed') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.requestCare.fields.created_by') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($requestCares as $key => $requestCare)
                                    <tr data-entry-id="{{ $requestCare->id }}">
                                        <td>
                                            {{ $requestCare->pet->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->zip_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->details ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->start_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->start_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->end_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->end_time ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->booked_by->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->user_rating ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->pet_rating ?? '' }}
                                        </td>
                                        <td>
                                            {{ $requestCare->credits ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $requestCare->closed ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $requestCare->closed ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $requestCare->created_by->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('request_care_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.request-cares.show', $requestCare->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('request_care_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.request-cares.edit', $requestCare->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('request_care_delete')
                                                <form action="{{ route('frontend.request-cares.destroy', $requestCare->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('request_care_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.request-cares.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-RequestCare:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection