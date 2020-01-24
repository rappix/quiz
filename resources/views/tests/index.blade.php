@extends('master')

@section('content')
	
	<a href="{{ route('create_test') }}" class="btn btn-primary mb-3">Create NEW Test</a>

	<h1>or edit existing ones</h1>

	@foreach($tests as $test)
		<a href="{{ route('edit_test', ['test_id' => $test->id]) }}">{{ $test->name }}</a><br>
	@endforeach

	@if($errors->any())
	    <div class="alert alert-danger">{{ $errors->first() }}</div>
	@endif

	@if(session('success'))
	    <div class="alert alert-success">{{ session('success') }}</div>
	@endif

@endsection