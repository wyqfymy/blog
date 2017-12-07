<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //
    public $table = 'permissions';
    public $primaryKey = 'p_id';
    public $guarded = [];
    public $timestamps = false;
}