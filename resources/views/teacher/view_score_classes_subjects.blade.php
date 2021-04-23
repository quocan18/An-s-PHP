@extends('layer.master')
@section('body')
<form action="{{ route('process_score') }}" method="post">
	{{csrf_field()}}
Select classes
<select class="form-control" name="classes_id">
	@foreach($array_classes as $classes)
		<option value="{{$classes->classes_id}}"
			@if ($classes_id==$classes->classes_id)
				selected 
			@endif>
			{{$classes->classes_name}}
		</option>
	@endforeach
</select>
<br>
Select subjects
<select class="form-control" name="subjects_id">
	@foreach($array_subjects as $subjects)
		<option value="{{$subjects->subjects_id}}"
			@if ($subjects_id==$subjects->subjects_id)
				selected 
			@endif>
			{{$subjects->subjects_name}}
		</option>
	@endforeach
</select>
<br>
<button>OK</button>
</form>
<form action="{{ route('update_score') }}">
	<input type="hidden" name="subjects_id" value="{{$subjects_id}}">
<table class="table">
	<tr>
		<th>Students id</th>
		<th>Students Name</th>
		<th>Type score</th>
	</tr>
	@foreach($array_students as $students)
		<tr>
			<td>{{$students->students_id}}</td>
			<td>{{$students->students_name}}</td>
			<td>
				<input type="number" name="array_score[{{$students->students_id}}]" value="{{$array_score[$students->students_id]}}">
			</td>
		</tr>
	@endforeach
</table>
<button>Done</button>
</form>
@endsection