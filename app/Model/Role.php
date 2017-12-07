<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $table = 'role';
    public $primaryKey = 'role_id';
    public $guarded = [];
    public $timestamps = false;


    public function users()
    {
        return $this->belongsToMany(User::class,'role_user','role_id','uid');
        // 角色用户关联 ， 角色id,用户id
    }


    public function permission()
    {
        return $this->belongsToMany(Permission::class,'role_p','role_id','p_id');
    }
}
