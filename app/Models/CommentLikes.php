<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentLikes extends Model {
    public function Comment() {
        return $this->belongsTo(Comments::class);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}
