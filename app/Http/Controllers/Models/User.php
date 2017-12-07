<?php

namespace App\Http\Controllers\Models;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class User extends Controller
{
    /**
     *
     *
     */
    // 模型关联的表,命名符合规范可以不写
    public $table = 'admin_login';
    // 定义表的主键
    public $primarykey = 'admin_id';

    // 定义时间戳 laravel会自动维护create_at update_at 两个字段, 如果表中没有这两个字段,一定要关闭自维护
//    public $timestamps = false;

    public $timestamps = false;
    
    public $fillable = ['admin_name','admin_password','admin_telephone','admin_email','admin_address'];


}
