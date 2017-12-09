<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

use App\Model\Cate;

use App\Http\Controllers\Controller;



class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeOrder(Request $request)
    {
        $cate_id = $request->input('cate_id');
        $cate_order = $request->input('cate_order');
        // dd($cate_id);
        $cate = Cate::find($cate_id);
        $res = $cate->update(['cate_order'=>$cate_order]);
        $data = [];
        //如果修改成功
        if($res){
            $data = [
                'status'=>0,
                'news'=>'修改成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'news'=>'修改失败'
            ];
        }
        return $data;

    }

    public function index()
    {
        //获取所有分类
        $cates=  Cate::tree(); 
        
        foreach($cates as $k=>$v){
            // dd($v);
            // 
            //找他的父类(如果其不存在,则为一级分类)
            $menu = \DB::select('select * from article_cate where cate_id = ?', [$v['pid']]);
            
            if($menu){
                //二级类是他本身
                $menuname = $menu[0]->cate_name;
                $v['pid_name'] = $menuname;
                
            }else{
                //一级类
                $v['pid_name'] = '/';
                // dd($cates);
            }
           
            
            
        }
        // dd($cates);
        return view('admin.cate.index', compact('cates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取模型中的所有的分类
        $cateOne = Cate::where('pid',0)->get(); 

        return view('admin.cate.add',compact('cateOne') );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //获取数据
        $input = $request->only('cate_name','cate_order');

         //获取数据
        $input = $request->except('_token');
        // dd($input);
        if($input['cate_name'] == ''){
            return back()->with('msg','分类名不可为空');
        }
       //若分类名大于 10,则返回;
       if ( isset ($input['cate_name']{10}) ){
            return back() -> with('msg','分类名不可为空');
       }
       if( !is_numeric($input['cate_order']) ){
            return back() -> with('msg','排序字段是整数,不能输入别的类型哦');
        }else if($input['cate_order'] < 1 ){
            return back() -> with('msg','排序字段是整数,不能是小于1');
        }else if($input['cate_order'] < 1){
             return back() -> with('msg','排序字段是整数,不能是大于200');
        }

        
        //执行添加操作
        $cate = new Cate();  //创建manu对象 对数据库进行操作
        $cate->pid = $input['pid'];
        $cate->cate_name = $input['cate_name'];
        $cate->cate_keyword = $input['cate_keyword'];
        $cate->cate_description = $input['cate_description'];
        $cate->cate_order = $input['cate_order'];
        //将$cate对象 表存到数据库(数据库的表在Model\Cate.php中设置)
        $res = $cate->save();
        if($res){
            return redirect('admin/cate')->with('msg', '添加成功');
        }else{
            //with将数据放到session中
            return redirect('admin/cate/create')->with('msg', '添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //修改 字段有(父id(一级类),分类名称,排序字段,分类关键字,分类描述)
        $cateOne = Cate::find($id); //找到指定id的所有数据
        
        if($cateOne->pid == 0){
            //判断一级类中是否有子类
            $res = Cate::where('pid',$cateOne->cate_id)->get();
            
            foreach($res as $v){
                if($v){
                    // 有子类 获得结果是空
                    $cates = Cate::where('cate_id',0)->get();
                    // dd($cates);

                }else{
                    //获取一级类
                    $cates = Cate::where('pid',0)->get();
                    // dd($cates);
                }
            }
           
        }else{
            //二级类
             $cates = Cate::where('pid',0)->get();
              // dd($cates);
        }    
        // dd($cateOne['cate_name']);
        return view('admin.cate.edit', compact('cateOne','cates'));
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_token','_method');
       // dd($input);
        $res = Cate::find($id)->update($input);
        
        if($res){
            return redirect('admin/cate')->with('msg', '修改成功');
        }else{
            return redirect('admin/cate')->with('msg', '修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //看是否有父类
        $noDel = Cate::where('pid', $id)->first();
       
        $data = [];

        if ($noDel) {
            $data['error'] = 3;
            $data['msg'] = "您的下面有子类不能删除";
       }else {
            $res = Cate::find($id)->delete();
            if ($res) {
                $data['error'] = 0;
                $data['msg'] = "删除成功";
            } else {
                $data['error'] = 1;
                $data['msg'] = "删除失败";
            }
        }
        return $data;
        
    }


}
