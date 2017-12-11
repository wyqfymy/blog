<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PinglunController extends Controller
{   
    function create(){
       $res =  \DB::table('pinglun')->insert( [
                    'article_id'  =>  $_POST['article_id'],
                    'ping_content' =>  $_POST['con'],
                    'uid'         =>  $_POST['uid'],
                ]);

        if($res){
            return 1;
        }else{
            return 0;
        }
    }

    function index(){
         $res =  \DB::table('pinglun')->where('article_id', $_POST['article_id'])->get();
         return $res;
    }
}
