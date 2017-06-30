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
}
