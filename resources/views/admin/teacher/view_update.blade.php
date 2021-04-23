@extends('layer.master')
@section('body')
<form action="{{ route('process_update_teacher',['teacher_id'=>$each->teacher_id]) }}" method="post">
	{{csrf_field()}}
<table>
<tr>
	<th>Teacher Name</th>
	<td><input type="text" name="teacher_name" value="{{$each->teacher_name}}"></td>
</tr>
<tr>
	<th>Gender</th>
	<td>
		<label>
			<input type="radio" name="gender" value="1"
			@if($each->gender==1) checked
				@endif>
				Male
		</label>
		<label>
			<input type="radio" name="gender" value="1"
			@if($each->gender==0) checked
				@endif>
				Female
		</label>
	</td>
</tr>
<tr>
	<th>Email</th>
	<td><input type="text" name="email" value="{{$each->email}}"></td>
</tr>
<tr>
	<th>Password</th>
	<td><input type="text" name="password" value="{{$each->password}}"></td>
</tr>
</table>
	<button>Fix</button>
</form>
@endsection