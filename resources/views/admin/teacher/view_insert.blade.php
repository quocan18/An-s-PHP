@extends('layer.master')
@section('body')
<form action="{{ route('process_insert_teacher') }}" method="post">
	{{csrf_field()}}
<table>
<tr>
	<th>Teacher Name</th>
	<td><input type="text" name="teacher_name"></td>
</tr>
<tr>
	<th>Gender</th>
	<td>
		<label><input type="radio" name="gender" value="1">Male</label>
		<label><input type="radio" name="gender" value="0">Female</label>
	</td>
</tr>
<tr>
	<th>Email</th>
	<td><input type="text" name="email"></td>
</tr>
<tr>	
	<th>Password</th>
	<td><input type="password" name="password"></td>
</tr>
</table>
	<button>ADD</button>
</form>
@endsection