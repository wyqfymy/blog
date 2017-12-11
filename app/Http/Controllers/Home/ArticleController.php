<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function article(Request $request)
    {
        $id = $request['id'];
        $arr = \DB::table('article_list')->where('article_id',$id)->get();
        
foreach($arr as $v){
    $arr = $v;
}

  
        return view('home.index.content')->with('data',$arr);


        
    }
}
