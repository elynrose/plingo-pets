@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.pet.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.pets.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="photos">{{ trans('cruds.pet.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pet.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.pet.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pet.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="breed">{{ trans('cruds.pet.fields.breed') }}</label>
                            <input class="form-control" type="text" name="breed" id="breed" value="{{ old('breed', '') }}" required>
                            @if($errors->has('breed'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('breed') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pet.fields.breed_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.pet.fields.size') }}</label>
                            <select class="form-control" name="size" id="size" required>
                                <option value disabled {{ old('size', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Pet::SIZE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('size', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('size'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('size') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pet.fields.size_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="age">{{ trans('cruds.pet.fields.age') }}</label>
                            <input class="form-control" type="text" name="age" id="age" value="{{ old('age', '') }}" required>
                            @if($errors->has('age'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('age') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pet.fields.age_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.pet.fields.gets_along_with') }}</label>
                            @foreach(App\Models\Pet::GETS_ALONG_WITH_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="gets_along_with_{{ $key }}" name="gets_along_with" value="{{ $key }}" {{ old('gets_along_with', '') === (string) $key ? 'checked' : '' }} required>
                                    <label for="gets_along_with_{{ $key }}">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('gets_along_with'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('gets_along_with') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pet.fields.gets_along_with_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_immunized" value="0">
                                <input type="checkbox" name="is_immunized" id="is_immunized" value="1" {{ old('is_immunized', 0) == 1 ? 'checked' : '' }}>
                                <label for="is_immunized">{{ trans('cruds.pet.fields.is_immunized') }}</label>
                            </div>
                            @if($errors->has('is_immunized'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('is_immunized') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.pet.fields.is_immunized_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="created_by_id">{{ trans('cruds.pet.fields.created_by') }}</label>
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
                            <span class="help-block">{{ trans('cruds.pet.fields.created_by_helper') }}</span>
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
    Dropzone.options.photosDropzone = {
    url: '{{ route('frontend.pets.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photos"]').remove()
      $('form').append('<input type="hidden" name="photos" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photos"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($pet) && $pet->photos)
      var file = {!! json_encode($pet->photos) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photos" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection