@extends('layer.master')
@section('body')
<a href="{{ route('view_insert_subjects') }}">
	ADD
</a>
<table class="table">
	<tr>
		<th>Subjects Id</th>
		<th>Subjects Name</th>
		<th>Description</th>
		<th>Fix</th>
	</tr>
	@foreach($array as $each)
		<tr>
			<td>{{$each->subjects_id}}</td>
			<td>{{$each->subjects_name}}</td>
			<td>{{$each->description}}</td>
			<td>
				<a href="{{ route('view_update_subjects',['subjects_id'=>$each->subjects_id]) }}">
					Fix
				</a>
			</td>
		</tr>
	@endforeach
</table>
@endsection