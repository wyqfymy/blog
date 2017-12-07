<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //后台登录模型
    public $table = 'admin_login'; //表名(不指定表名字的话 将默认为类名s)
    public $primaryKey = 'admin_id';//主键
    public $guarded = []; //不可修改的字段
    public $timestamps = false; //是否开启时间(create_at update_at)


    /**
     * 通过用户模型查找关联的角色模型
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsToMany('App\Model\Role','role_user','uid','role_id');
    }

    //关联用户详情模型
    public function userifo()
    {
        return $this->hasOne('App\Model\UserInfo','uid','user_id');
    }

}
