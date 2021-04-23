@extends('layer.master')
@section('body')
<form action="{{ route('process_update_students',['students_id'=>$each->students_id]) }}" method="post">
	{{csrf_field()}}
	<table>
	<tr>
		<th>Students Name</th>
		<td><input type="text" name="students_name" value="{{$each->students_name}}"></td>
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
			<input type="radio" name="gender" value="0"
			@if($each->gender==0) checked
				@endif>
				Female
		</label>
		</td>
	</tr>
	<tr>
		<th>Date of birth</th>
		<td><input type="date" name="date_of_birth" value="{{$each->date_of_birth}}"></td>
	</tr>
	<tr>
		<th>Email</th>
		<td><input type="text" name="email" value="{{$each->email}}"></td>
	</tr>
	<tr>
		<th>Phone number</th>
		<td><input type="number" name="phone_number" value="{{$each->phone_number}}"></td>
	</tr>
<tr>
	<th>Classes</th>
	<td>
	<select name="classes_id">
		@foreach($array_classes as $classes)
		<option value="{{$classes->classes_id}}"@if($each->classes_id==$classes->classes_id)selected @endif>{{$classes->classes_name}}
		</option>
		@endforeach
	</select>
	</td>
</tr>
</table>
	<button>Fix</button>
</form>
@endsection