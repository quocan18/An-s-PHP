@extends('layer.master')
@section('body')
<a href="{{ route('view_insert_teacher') }}">
	ADD
</a>
<table class="table">
	<tr>
		<th>Teacher Id</th>
		<th>Teacher Name</th>
		<th>Fix</th>
	</tr>
	@foreach($array as $each)
		<tr>
			<td>{{$each->teacher_id}}</td>
			<td>{{$each->teacher_name}}</td>
			<td>
				<a href="{{ route('view_update_teacher',['teacher_id'=>$each->teacher_id]) }}">
					Fix
				</a>
			</td>
		</tr>
	@endforeach
</table>
@endsection