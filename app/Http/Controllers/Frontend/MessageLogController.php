<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMessageLogRequest;
use App\Http\Requests\StoreMessageLogRequest;
use App\Http\Requests\UpdateMessageLogRequest;
use App\Models\MessageLog;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MessageLogController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('message_log_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messageLogs = MessageLog::with(['user'])->get();

        return view('frontend.messageLogs.index', compact('messageLogs'));
    }

    public function create()
    {
        abort_if(Gate::denies('message_log_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.messageLogs.create', compact('users'));
    }

    public function store(StoreMessageLogRequest $request)
    {
        $messageLog = MessageLog::create($request->all());

        return redirect()->route('frontend.message-logs.index');
    }

    public function edit(MessageLog $messageLog)
    {
        abort_if(Gate::denies('message_log_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $messageLog->load('user');

        return view('frontend.messageLogs.edit', compact('messageLog', 'users'));
    }

    public function update(UpdateMessageLogRequest $request, MessageLog $messageLog)
    {
        $messageLog->update($request->all());

        return redirect()->route('frontend.message-logs.index');
    }

    public function show(MessageLog $messageLog)
    {
        abort_if(Gate::denies('message_log_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messageLog->load('user');

        return view('frontend.messageLogs.show', compact('messageLog'));
    }

    public function destroy(MessageLog $messageLog)
    {
        abort_if(Gate::denies('message_log_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messageLog->delete();

        return back();
    }

    public function massDestroy(MassDestroyMessageLogRequest $request)
    {
        $messageLogs = MessageLog::find(request('ids'));

        foreach ($messageLogs as $messageLog) {
            $messageLog->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
