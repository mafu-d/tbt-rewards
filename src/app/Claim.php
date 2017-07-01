<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    private static $statusTexts = [
        -1 => 'Rejected',
        0 => 'In progress',
        1 => 'Ready',
        2 => 'Submitted',
        3 => 'Accepted'
    ];
    // Check current status
    public function status() {
        return self::$statusTexts[$this->status];
    }

    // Each claim has one user (creator)
    public function user() {
        return $this->hasOne('\App\User', 'id', 'user_id');
    }

    // Each claim can have multiple uploads
    public function uploads() {
        return $this->hasMany('\App\Upload', 'claim_id', 'id');
    }
}
