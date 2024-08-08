@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.requestCare.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.request-cares.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="pet_id">{{ trans('cruds.requestCare.fields.pet') }}</label>
                            <select class="form-control select2" name="pet_id" id="pet_id" required>
                                @foreach($pets as $id => $entry)
                                    <option value="{{ $id }}" {{ old('pet_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('pet'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pet') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.pet_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="zip_code">{{ trans('cruds.requestCare.fields.zip_code') }}</label>
                            <input class="form-control" type="text" name="zip_code" id="zip_code" value="{{ old('zip_code', '') }}" required>
                            @if($errors->has('zip_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('zip_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.zip_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="details">{{ trans('cruds.requestCare.fields.details') }}</label>
                            <textarea class="form-control" name="details" id="details" required>{{ old('details') }}</textarea>
                            @if($errors->has('details'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('details') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.details_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="start_date">{{ trans('cruds.requestCare.fields.start_date') }}</label>
                            <input class="form-control date" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                            @if($errors->has('start_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('start_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.start_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="start_time">{{ trans('cruds.requestCare.fields.start_time') }}</label>
                            <input class="form-control timepicker" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                            @if($errors->has('start_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('start_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.start_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="end_date">{{ trans('cruds.requestCare.fields.end_date') }}</label>
                            <input class="form-control date" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                            @if($errors->has('end_date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end_date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.end_date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="end_time">{{ trans('cruds.requestCare.fields.end_time') }}</label>
                            <input class="form-control timepicker" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                            @if($errors->has('end_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('end_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.end_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="booked_by_id">{{ trans('cruds.requestCare.fields.booked_by') }}</label>
                            <select class="form-control select2" name="booked_by_id" id="booked_by_id">
                                @foreach($booked_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('booked_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('booked_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('booked_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.booked_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_rating">{{ trans('cruds.requestCare.fields.user_rating') }}</label>
                            <input class="form-control" type="number" name="user_rating" id="user_rating" value="{{ old('user_rating', '') }}" step="1">
                            @if($errors->has('user_rating'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user_rating') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.user_rating_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_review">{{ trans('cruds.requestCare.fields.user_review') }}</label>
                            <textarea class="form-control ckeditor" name="user_review" id="user_review">{!! old('user_review') !!}</textarea>
                            @if($errors->has('user_review'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user_review') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.user_review_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pet_rating">{{ trans('cruds.requestCare.fields.pet_rating') }}</label>
                            <input class="form-control" type="number" name="pet_rating" id="pet_rating" value="{{ old('pet_rating', '') }}" step="1">
                            @if($errors->has('pet_rating'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pet_rating') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.pet_rating_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pet_review">{{ trans('cruds.requestCare.fields.pet_review') }}</label>
                            <textarea class="form-control ckeditor" name="pet_review" id="pet_review">{!! old('pet_review') !!}</textarea>
                            @if($errors->has('pet_review'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pet_review') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.pet_review_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="credits">{{ trans('cruds.requestCare.fields.credits') }}</label>
                            <input class="form-control" type="number" name="credits" id="credits" value="{{ old('credits', '') }}" step="1" required>
                            @if($errors->has('credits'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('credits') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.credits_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="closed" value="0">
                                <input type="checkbox" name="closed" id="closed" value="1" {{ old('closed', 0) == 1 ? 'checked' : '' }}>
                                <label for="closed">{{ trans('cruds.requestCare.fields.closed') }}</label>
                            </div>
                            @if($errors->has('closed'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('closed') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.closed_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="created_by_id">{{ trans('cruds.requestCare.fields.created_by') }}</label>
                            <select class="form-control select2" name="created_by_id" id="created_by_id" required>
                                @foreach($created_bies as $id => $entry)
                                    <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('created_by'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('created_by') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.requestCare.fields.created_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('frontend.request-cares.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $requestCare->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection