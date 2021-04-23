@extends('layer.master')
@section('body')
<form action="{{ route('view_score_classes_subjects') }}" method="post">
	{{csrf_field()}}
	<center><b>Score list</b></center>
Select classes
<select class="form-control" name="classes_id">
	@foreach($array_classes as $classes)
		<option value="{{$classes->classes_id}}">
			{{$classes->classes_name}}
		</option>
	@endforeach
</select>
<br>
Select subjects
<select class="form-control" name="subjects_id">
	@foreach($array_subjects as $subjects)
		<option value="{{$subjects->subjects_id}}">
			{{$subjects->subjects_name}}
		</option>
	@endforeach
</select>
<br>
<button>OK</button>
</form>
@endsection