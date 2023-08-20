<?php

namespace App\Listeners;

use App\Models\UserActivity; // Import the UserActivity model
use Illuminate\Auth\Events\Login; // Import the Login event class
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    public function __construct()
    {
        // Constructor
    }

    public function handle(Login $event)
    {
        $user = $event->user;
    
        // Check if the user is not an admin
        if (!$user->is_admin) {
            UserActivity::create([
                'user_id' => $user->id,
                'action' => 'login', // You can customize the action
            ]);
        }
    }
}
