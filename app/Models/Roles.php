<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    public function permissions() {
        return $this->belongsToMany(Permissions::class, 'roles_permissions');
    }
}
