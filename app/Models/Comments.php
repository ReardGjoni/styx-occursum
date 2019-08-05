<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {
    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Meetup() {
        return $this->belongsTo(Meetup::class);
    }
}
