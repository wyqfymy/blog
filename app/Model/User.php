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
}
