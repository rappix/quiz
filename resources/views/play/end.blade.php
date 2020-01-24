@extends('master')

@section('content')

	<div class="card">
		<div class="card-header"><h3>{{ $play->test->name }}</h3></div>
		<div class="card-body">
			<h2 class="card-title">{{ $play->results()->correct }}/{{ $play->results()->total }} your result!</h2>
			@foreach($play->uanswers as $uanswer)
				{{ $uanswer->question->name }}
				<br>
				@foreach($uanswer->question->answers as $answer)
					@if($answer->correct)
						<h5 class="d-inline"><span class="badge badge-success">{{ $answer->name }}</span></h5>
					@elseif($uanswer->answer_id == $answer->id)
						<h5 class="d-inline"><span class="badge badge-danger">{{ $answer->name }}</span></h5>
					@else
						<h5 class="d-inline"><span class="badge badge-light">{{ $answer->name }}</span></h5>
					@endif
				@endforeach
				<br><br>
			@endforeach
			<div class="progress">
				<div class="progress-bar bg-success" role="progressbar" style="width: {{ $play->results()->success }}%" aria-valuenow="{{ $play->results()->success }}" aria-valuemin="0" aria-valuemax="100"></div>
			</div>
			<br>
			<a href="{{ route('start_play', ['test_id' => $play->test->id]) }}" class="btn btn-success">Take this test again</a>
			<a href="/" class="btn btn-primary">Back to Home</a>
		</div>
	</div>
@endsection