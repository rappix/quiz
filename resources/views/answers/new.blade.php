<div class="form-check form-check-inline">
	<input type="text" class="form-control mb-3" placeholder="Possible answer" id="answer{{ $answer_count }}" name="answer[{{ $answer_count }}]" value="{{ $answer ?? '' }}">
	<input type="radio" class="form-check-input" id="correct{{ $answer_count }}" value="{{ $answer_count }}" name="correct[]" style="margin-left: 0.5rem;" {{ $correct == $answer_count ? 'checked' : '' }}>
	<label class="form-check-label" for="correct{{ $answer_count }}">Correct</label>
</div>
<div style="clear: both;"></div>