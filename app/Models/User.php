<?php 

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	// 模型关联的表,如果命名规范可以不定义
	public $table = 'admin_login';
	// 定义主键 默认值就是id
	public $primaryKey = 'admin_id';
	// 定义时间戳 larval会自动维护create_at update_at两个表字段，所以如果表中没有这两个字段，一定要关闭自维护
	public $timestamps = false;

	// 设置允许修改的字段
	// public $fillable = ['admin_name','admin_password','admin_telephone','admin_email','admin_address'];
	// 不允许修改的字段
	public $guarded = [];
	// 一对一

// 	public function userinfo()
// 	{
// //        参数1 ：要关联的模型
// //        参数2：外键
// //        参数3：当前模型的主键
// //        return $this->hasOne('App\Phone', 'foreign_key', 'local_key');
// 		return $this->hasOne('App\Models\UserInfo','uid','id')
// 	}
}