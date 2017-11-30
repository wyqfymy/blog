<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
	<table border="1px">
		<tr>
			<th>分类ID</th>
			<th>分类name</th>
			<th>pid</th>
			<th>path</th>
		</tr>
		@foreach($cates as $key=>$val)
		<tr>
			<td>{{$val}}</td>
		</tr>
		@endforeach
	</table>r	
</html>