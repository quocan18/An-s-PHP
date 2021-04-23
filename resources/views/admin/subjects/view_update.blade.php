@extends('layer.master')
@section('body')
<form action="{{ route('process_update_subjects',['subjects_id'=>$each->subjects_id]) }}" method="post">
	{{csrf_field()}}
<table>
<tr>
	<th>Subjects Name</th>
	<td><input type="text" name="subjects_name" value="{{$each->subjects_name}}"></td>
</tr>
<tr>
	<th>Description</th>
	<td><input type="text" name="desrciption" value="{{$each->description}}"></td>
</tr>
</table>
	<button>Fix</button>
</form>
@endsection