<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */

    public function created(User $user): void
    {
        Cache::forget('users');
    }

    public function updated(User $user): void
    {
        Cache::forget('users');
    }

}
