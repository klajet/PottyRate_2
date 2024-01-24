<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usersRoles extends Model
{
    // use HasFactory;
    protected $table = 'userRoles';
    protected $fillable = [
        'roles_id', 'users_id',
    ];
}
