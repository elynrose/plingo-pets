<?php

namespace App\Http\Requests;

use App\Models\MessageLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMessageLogRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('message_log_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'message' => [
                'required',
            ],
        ];
    }
}
