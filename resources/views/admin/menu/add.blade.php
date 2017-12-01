<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
	<form action="{{asset('/admin/menu/insert')}}" method="post">

		{{csrf_field()}}
		分类名称:<input type="text" name="catename">
		<input type="submit" value="提交分类">
		<!-- <button id="btn">提交</button> -->
	</form>
</html>