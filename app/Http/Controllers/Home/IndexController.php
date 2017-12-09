<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Cate;

class IndexController extends Controller
{
    public function first()
    {
    	//获取分类信息
    	// $cates = Cate::tree();
    	// $data['cates'] = $cates;
    	
    	$data = Cate::fenlei();
    	
        return view('hcomment', compact('data'));
    	// return view('hcomment');
    }
}
  