<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model {
    public $timestamps = false;

    public function Meetup() {
        return $this->hasMany(Meetup::class);
    }
    
    public function GroupMeetups() {
        return $this->hasMany(GroupMeetups::class);
    }

}