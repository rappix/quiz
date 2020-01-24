@extends('master')

@section('content')

	<h1>Choose test you would like to take</h1>

	@foreach($tests as $test)
		@if($test->questionsCount() < 1)
			@continue
		@endif
		<a href="{{ route('start_play', ['test_id' => $test->id]) }}">{{ $test->name }}</a> ({{ $test->questionsCount() }} questions)<br>
	@endforeach

@endsection