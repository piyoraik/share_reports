@extends('layouts.app')
@section('content')
<div class="card">
	<form method="POST" action="{{ route('reportUpdate', ['id' => $report->id] ) }}">
		@csrf
		<div class="col-md-10 mx-auto">
			<div class="mt-2">
				<h1>レポート編集</h1>
			</div>
			<div class="mb-3 mt-3">
				<label for="rp_date" class="form-label">作業日</label>
				<input type="date" value="{{ old('rp_date') ? old('rp_date') : $report->rp_date }}" name="rp_date"
					class="form-control" id="rp_date" required>
			</div>
			<div class="mb-3">
				<label for="rp_time_from" class="form-label">作業開始時間</label>
				<input type="time" value="{{ old('rp_time_from') ? old('rp_time_from') : $report->rp_time_from }}"
					name="rp_time_from" class="form-control" id="rp_time_from" required>
			</div>
			<div class="mb-3">
				<label for="rp_time_to" class="form-label">作業終了時間</label>
				<input type="time" value="{{ old('rp_time_to') ? old('rp_time_to') : $report->rp_time_to }}" name="rp_time_to"
					class="form-control" id="rp_time_to" required>
			</div>
			<div class="mb-3">
				<label for="rp_content" class="form-label">作業内容</label>
				<textarea name="rp_content" id="rp_content" class="form-control" cols="30" rows="10"
					required>{{old('rp_content') ? old('rp_content') : $report->rp_content}}</textarea>
			</div>
			<div class="mb-3">
				<label for="reportcate_id" class="form-label">作業種類ID</label>
				<select name="reportcate_id" class="form-control" id="">
					@foreach ($reportCates as $reportCase)
					<option {{$report->reportcate->id == $reportCase->id ? "selected": ""}} value="{{$reportCase->id}}" required>
						{{$reportCase->rc_name}}
					</option>
					@endforeach
				</select>
			</div>
			<div class="mb-3 row justify-content-center d-flex">
				<a href="{{route('reportShow', ['id' => $report->id])}}" class="btn btn-success col-md-6">Back</a>
				<button type="submit" class="btn btn-primary col-md-6">Submit</button>
			</div>
	</form>
</div>
@endsection
