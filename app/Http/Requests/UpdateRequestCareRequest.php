<?php

namespace App\Http\Requests;

use App\Models\RequestCare;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequestCareRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('request_care_edit');
    }

    public function rules()
    {
        return [
            'pet_id' => [
                'required',
                'integer',
            ],
            'zip_code' => [
                'string',
                'required',
            ],
            'details' => [
                'required',
            ],
            'start_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'start_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_time' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'user_rating' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pet_rating' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'credits' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
