@extends('master')

@section('content')
	
	<a href="{{ route('create_test') }}" class="btn btn-primary mb-3">Create NEW Test</a>

	<h1>or edit existing ones</h1>

	@foreach($tests as $test)
		<br><a href="{{ route('edit_test', ['test_id' => $test->id]) }}">{{ $test->name }}</a>
	@endforeach

@endsection