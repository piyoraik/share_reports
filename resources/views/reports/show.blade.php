@extends('layouts.app')
@section('content')
<div class="card mb-3">
	<div class="card-header">
		<h2>
			レポートID：{{$report->id}}
		</h2>
		<small>更新日時：{{$report->rp_created_at}}</small>
		<p>
			<a href="{{route('reportEdit', ['id' => $report->id])}}" class="btn btn-success">Edit</a>
			<a href="{{route('reportConfirmDelete', ['id' => $report->id])}}" class="btn btn-danger">Delete</a>
		</p>
	</div>
	<div class="card-body">
		<h4 class="card-title"><b>投稿者</b>：{{ $report->user->us_name }}</h4>
		<h5 class="card-title"><b>作業日</b>：{{ $report->rp_date }}</h5>
		<h5 class="card-title"><b>作業開始時間</b>：{{ $report->rp_time_from }}</h5>
		<h5 class="card-title"><b>作業終了時間</b>：{{ $report->rp_time_to }}</h5>
		<h5 class="card-title"><b>作業種類</b>：{{ $report->reportcate->rc_name }}</h5>
		<p class="card-text">{!! nl2br(e($report->rp_content)) !!}</p>
	</div>
</div>
@endsection
