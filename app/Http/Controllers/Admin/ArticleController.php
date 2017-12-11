<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\cate;
use App\model\article;

class ArticleController extends Controller
{
    public function index()
    {	
    	$res = Article::find(1);
    	return $res;
    }

    public function add()
    {   

        $res = cate::fenlei();

    	return view('admin/article/add', compact('res'));
    }

    public function upload(Request $request)
    {
            //获取客户端传过来的文件
        $file = $request->file('file_upload');

        if($file->isValid()){
            //        获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();

            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = time().rand(1000,9999).uniqid().'.'.$ext;

            //设置上传文件的目录
            $dirpath = public_path().'/uploads/';

            //将文件移动到本地服务器的指定的位置，并以新文件名命名
            $file->move($dirpath, $newfile);

            return $newfile;
        }
        
    }


    function create()
    {
 
       $res = \DB::table('article_list')->insert([
            'article_title' => $_POST['title'], 
            'cate_id' => $_POST['bankuai'], 
            'suoimg' => $_POST['suoimg'], 
            'article_content' => $_POST['content'],       
            'article_biaoqian' => $_POST['biaoqian'],       
            'addtime' => time(),       
        ]);
    }

    function index()
    {
        $res = \DB::table('article_list')->get();

        return view('Home.index')->with('data',$res);
    }
}
