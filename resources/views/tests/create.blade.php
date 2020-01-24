@extends('master')

@section('content')

<form action="{{ route('store_test') }}" method="post">
    {{ csrf_field() }}
    <h1>Add New Test</h1>
    <div class="form-group">
        <label for="name">Test Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Your test name" value="{{ old('name') }}">
    </div>

    <button type="submit" class="btn btn-primary mb-3">Create</button>
</form>

@if($errors->any())
    <div class="alert alert-danger">{{ $errors->first() }}</div>
@endif

@endsection