@extends('layer.master')
@section('body')
	<table class="table">
		<tr>
			<th colspan="2">Students ID: {{$students_id}}</th>
		</tr>
		<tr>
			<th colspan="2">Students Name: {{$array_students->students_name}}</th>
		</tr>
		<tr>
			<th>Subjects name</th>
			<th>Score</th>
		</tr>
		@foreach ($array as $subjects_id => $score)
			<tr>
				<td>{{$array_name_subjects[$subjects_id]}}</td>
				<td>{{$score[$students_id]}}</td>
			</tr>
			{{-- expr --}}
		@endforeach
	</table>
<button type="button"> <a href="{{ route('view_all_students') }}">OK</a>
</button>
@endsection