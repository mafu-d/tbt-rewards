<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    // Each upload is related to just one claim
    public function claim() {
        return $this->belongsTo('\App\Claim');
    }

    // Extend delete function to remove file as well
    public function delete() {
        unlink(storage_path('app/') . $this->filename);
        parent::delete();
    }
}
