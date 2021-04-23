@extends('layer.master')
@section('body')
<form action="{{ route('process_insert_subjects') }}" method="post">
	{{csrf_field()}}
<table>
<tr>
	<th>Subjects Name</th>
	<td><input type="text" name="subjects_name"></td>
</tr>
<tr>
	<th>Description</th>
	<td><input type="text" name="description"></td>
</tr>
</table>
	<button>ADD</button>
</form>
@endsection