<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    //添加
    public function add()
    {
    	return view('admin.menu.add');
    }

    //数据字典 加一个类别名称字段
    public function insert(Request $request)
    {
    	// echo '1111';
    	// $catename = $request->all();
    	$catename = $request->input('catename');
    	$catepid = $request->input('pid');
    	$catepid = empty($catepid) ? 0 :$catepid;
    	$arr['cate_name'] = $catename;
    	$arr['pid'] = $catepid;
    	$arr['path'] = "$catepid,";
    	$res = \DB::table('article_cate')->insert($arr);
    	if($res){
    		return '添加成功';
    	}else{
    		return '添加失败';
    	}
    }

    public function index()
    {
    	$cates = \DB::table('article_cate')->select();
    	// print_r($cates);
    	return view('admin.menu.  index',['cates'=>$cates]);
    }

}
