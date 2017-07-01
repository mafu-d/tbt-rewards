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

    // Friendly display of file name
    public function name() {
        return preg_replace('/^uploads\/[0-9]+_/', '', $this->filename);
    }
}
