@extends('common')

@section('content')

	<form class="am-form" action="{{url('admin/cate/').'/'.$cateOne->cate_id}}" method="post">
		<fieldset>
			<legend>后台分类修改</legend>
			{{csrf_field()}}
			{{method_field('put')}}
			<div class="am-form-group">
				<label for="doc-ipt-email-1">父分类名</label>
				<select name="pid" id="sel">
					<option value="0" >请分类</option>
					@if(!empty( $cates ) )
						@foreach($cates as $k=>$v)	
						
							@if($cateOne['pid'] == $v->cate_id )
								<option value="{{$v->cate_id}}" selected>{{$v->cate_name}}</option>

							@else
							<option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
							
							@endif

						@endforeach
					@endif	
				</select>
			</div>	
			<div class="am-form-group">
				<label for="doc-ipt-email-1">分类名</label>
				<input type="text" class="" value="{{$cateOne->cate_name}}" name="cate_name" placeholder="请输入分类名">
			</div>

			<div class="am-form-group">
				<label for="doc-ipt-email-1">排序字段</label>
				<input type="text" class="" value="{{$cateOne->cate_order}}" name="cate_order" placeholder="请输入排序字段">
			</div>
				
			<div class="am-form-group">
				<label for="doc-ipt-email-1">关键字</label>
				<input type="text" class="" value="{{$cateOne->cate_keyword}}" name="cate_keyword" placeholder="请输入关键字">
			</div>
			<tr>
				<th>描述</th>
				<td>
					<textarea name="cate_description" value="" placeholder="请输入分类描述">{{$cateOne->cate_description}}</textarea>
				</td>
			</tr>
			

			<button type="submit" class="am-btn am-btn-default">提交</button>
			<input type="button" class="back" onclick="history.go(-1)" value="返回">
		</fieldset>
	</form>

@stop