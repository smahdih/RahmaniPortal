<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 */
class Permission extends Model
{
    protected $fillable = [
        'name','guard_name'
    ];
}
