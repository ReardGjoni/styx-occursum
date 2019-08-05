<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMeetups extends Model {

    public $timestamps = false;

    public function Groups() {
        return $this->belongsTo(Groups::class);
    }

    public function Meetup() {
        return $this->belongsTo(Meetup::class);
    }
}
