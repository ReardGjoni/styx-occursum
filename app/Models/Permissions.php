<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    protected $table = 'permissions';

    public function roles() {
        return $this->belongsToMany(Roles::class,'roles_permissions');
     }
}
