<?php
// UserActivity.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivity extends Model
{
    // Other attributes and methods
    
    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
