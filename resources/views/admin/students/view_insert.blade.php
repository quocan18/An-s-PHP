@extends('layer.master')
@section('body')
<form action="{{ route('process_insert_students') }}" method="post">
		{{csrf_field()}}
		<table>
		<tr>
			<th>Students Name</th>
			<td><input type="text" name="students_name"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td>
				<label><input type="radio" name="gender" value="1">Male</label>
				<label><input type="radio" name="gender" value="0">Female</label>
			</td>
		</tr>
		<tr>
			<th>Date of birth</th>
			<td><input type="date" name="date_of_birth"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<th>Phone number</th>
			<td><input type="" name="phone_number"></td>
		</tr>
	<tr>
		<th>Classes</th>
		<td>
		<select name="classes_id">
			@foreach($array_classes as $classes)
				<option value="{{$classes->classes_id}}">
					{{$classes->classes_name}}
				</option>
			@endforeach
		</select>
		</td>
	</tr>
</table>
		<button>ADD</button>
</form>
@endsection