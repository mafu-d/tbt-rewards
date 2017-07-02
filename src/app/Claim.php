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
    public static $reward_preferences = [
        '&pound;250 Amazon vouchers',
        'London Theatre Weekend voucher',
        'Lenovo Tab3 10 Business Tablet'
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
    public function attachments() {
        return $this->hasMany('\App\Attachment', 'claim_id', 'id');
    }
}
