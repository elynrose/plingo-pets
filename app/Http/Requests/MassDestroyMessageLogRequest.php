<?php

namespace App\Http\Requests;

use App\Models\MessageLog;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMessageLogRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('message_log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:message_logs,id',
        ];
    }
}
