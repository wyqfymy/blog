<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $table = 'article_cate';
    public $primaryKey = 'cate_id';
    public $guarded = [];
    public $timestamps = false;

    // 
    public static function tree()
    {
        $cates = self::orderBy('cate_order','asc')->get();
        //对分类数据进行格式化（排序、缩进）
        return self::getTree($cates,0);
    }


    /**
     * 对分类数据进行格式化（排序、缩进）
     */
   	public static function getTree($Category,$pid)
    {
        //存放最终结果的数组
        //
        
        $arr = [];
        foreach($Category as $k=>$v){

            $cates[] = $v->original;
            $name = $cates[$k]['cate_name'];
            // dd($cates[$k]);
            if($cates[$k]['pid'] == 0){
                $cates[$k]['cate_names'] = $name;
            }else{
                $cates[$k]['cate_names'] = '--&nbsp;&nbsp;&nbsp;'.$name;
            }
            
            // $cates[$k]['cate_names'] = '|---'.$name;
            // $res['cate_name'] = '孙佳';
             // dd($res['cate_name']);

        }
        // dd($cates);
        return $cates;
    }

    public function fenlei()
    {

    }


}
