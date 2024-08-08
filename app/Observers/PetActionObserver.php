<?php

namespace App\Observers;

use App\Models\Pet;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class PetActionObserver
{
    public function created(Pet $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Pet'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
