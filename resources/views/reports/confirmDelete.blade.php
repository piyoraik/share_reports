@extends('layouts.app')
@section('content')
<div class="card mb-3 bg-secondary text-white">
	<div class="card-header">
		<h2>
			レポートID：{{$report->id}}を削除しますか？
		</h2>
	</div>
	<div class="card-body">
		<h4 class="card-title"><b>投稿者</b>：{{ $report->user->us_name }}</h4>
		<h5 class="card-title"><b>作業日</b>：{{ $report->rp_date }}</h5>
		<h5 class="card-title"><b>作業種類</b>：{{ $report->reportcate->rc_name }}</h5>
		<p class="card-text">{!! nl2br(e($report->rp_content)) !!}</p>
		<div class="row justify-content-center d-flex">
			<form method="post" name="thisform" action="{{route('reportDelete', ['id' => $report->id])}}"
				class="d-md-inline-block col-md-3">
				@csrf
				<a href="javascript: thisform.submit()" class="btn btn-danger col-md-12">Delete</a>
			</form>
			<a href="{{route('reportShow', ['id' => $report->id])}}" class="btn btn-success col-md-3">Back</a>
		</div>
	</div>
</div>
@endsection
