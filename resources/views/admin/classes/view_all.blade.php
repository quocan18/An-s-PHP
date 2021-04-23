@extends('layer.master')
@section('body')
<a href="{{ route('view_insert_classes') }}">
	ADD
</a>
<table class="table">
	<tr>
		<th>Classes Id</th>
		<th>Classes Name</th>
		<th>Fix</th>
	</tr>
	@foreach($array as $each)
		<tr>
			<td>{{$each->classes_id}}</td>
			<td>{{$each->classes_name}}</td>
			<td>
				<a href="{{ route('view_update_classes',['classes_id'=>$each->classes_id]) }}">
					Fix
				</a>
			</td>
		</tr>
	@endforeach
</table>
@endsection
