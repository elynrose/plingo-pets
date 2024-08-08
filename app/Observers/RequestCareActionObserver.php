<?php

namespace App\Observers;

use App\Models\RequestCare;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class RequestCareActionObserver
{
    public function created(RequestCare $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'RequestCare'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
