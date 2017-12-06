@extends('common')

@section('content')

	<form class="am-form" action="{{url('admin/cate')}}" method="post">
		<fieldset>
			<legend>后台分类添加 / <b style="font-size: 16px"><a href="{{url('admin/cate')}}">分类列表</a></b></legend>

			 @if (count($errors) > 0)
	            <div class="alert alert-danger">
	                <ul>
	                    @if(is_object($errors))
	                        @foreach ($errors->all() as $error)
	                            <li style="color:red">{{ $error }}</li>
	                        @endforeach
	                    @else
	                        <li style="color:red">{{ $errors }}</li>
	                    @endif
	                </ul>
	            </div>
        	@endif
			{{csrf_field()}}

				<!-- <div class="alert alert-danger"></div> -->				
				@if (session('msg'))
				<b style="color:red">{{session('msg')}}</b>
				
				@endif

			<div class="am-form-group">
				<label for="doc-ipt-email-1">一级分类</label>
				<select name="pid" id="form-control">
					<option value="0">请选择</option>
					@foreach($cateOne as $key=>$val)
						<option value="{{$val['cate_id']}}">{{$val['cate_name']}}</option> 
					@endforeach
				</select>
			</div>

			<div class="am-form-group">
				<label for="doc-ipt-email-1">分类名称</label>
				<input type="text" class="" name="cate_name" placeholder="请输入关键字">
			</div>

			<div class="am-form-group">
				<label for="doc-ipt-email-1">关键字</label>
				<input type="text" class="" name="cate_keyword" placeholder="请输入关键字">
			</div>
			<tr>
				<th>描述</th>
				<td>
					<label for="doc-ipt-email-1"></label>
					<textarea name="cate_description" placeholder="请输入分类描述"></textarea>
				</td>
			</tr>
			<div class="am-form-group">
				<label for="doc-ipt-email-1">排序号</label>
				<input type="text" class="" name="cate_order" placeholder="请输入排序号">
			</div>
			<button type="submit" class="am-btn am-btn-default">提交</button>
			<input type="button" class="back" onclick="history.go(-1)" value="返回">
		</fieldset>
	</form>

@stop