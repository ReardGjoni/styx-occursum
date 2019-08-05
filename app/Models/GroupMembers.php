<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupMembers extends Model {
    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Groups() {
        return $this->belongsTo(Groups::class);
    }
}