@extends('layer.master')
@section('body')
<a href="{{ route('view_insert_students') }}">
	ADD
</a>
<table class="table">
	<tr>
		<th>Students ID</th>
		<th>Students Name</th>
		<th>Gender</th>
		<th>Date of birth</th>
		<th>Email</th>
		<th>Phone Number</th>
		<th>Classes Name</th>
	</tr>
	@foreach($array as $each)
	<tr>
		<td>{{$each->students_id}}</td>
		<td>{{$each->students_name}}</td>
		<td>
			@if($each->gender==1) 
				Male
			@else 
				Female
			@endif
		</td>
		<td>{{$each->date_of_birth}}</td>
		<td>{{$each->email}}</td>
		<td>{{$each->phone_number}}</td>
		<td>{{$each->classes_name}}</td>
		<td>
			<button><a href="{{ route('view_update_students',['students_id'=>$each->students_id]) }}">Fix</a>
			</button>
			<button>
				<a href="{{ route('view_students_score',['students_id'=>$each->students_id]) }}">View student's score
				</a>
			</button>
		</td>
	</tr>
@endforeach
{{-- @foreach($array as $each)
	<tr>
		<td>{{$each->students_id}}</td>
		<td>{{$each->students_name}}</td>
		<td>{{$each->subjects_name}}</td>
		<td>{{$each->score}}</td>
	</tr>
@endforeach --}}
</table>
@endsection