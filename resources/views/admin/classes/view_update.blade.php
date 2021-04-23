@extends('layer.master')
@section('body')
<form action="{{ route('process_update_classes',['classes_id'=>$each->classes_id]) }}" method="post">
	{{csrf_field()}}
	Classes Name
	<input type="text" name="classes_name" value="{{$each->classes_name}}">
	<br>
	<button>Fix</button>
</form>
@endsection