@extends('layer.master')
@section('body')
<form action="{{ route('process_insert_classes') }}" method="post">
	{{csrf_field()}}
	Classes Name
	<input type="text" name="classes_name">
	<br>
	<button>ADD</button>
</form>
@endsection