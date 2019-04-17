<?php

namespace App\Model\Shared;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    const _MASTER  = 1;
    const _ADMIN   = 2;
    const _STUDENT = 3;
}
