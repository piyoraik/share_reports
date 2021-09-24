@extends('layouts.app')
@section('content')
<div class="col-md-10 mx-auto">
	<h1>レポートリスト表示</h1>
	<table class="table">
		<thead>
			<th>作業日</th>
			<th>作業内容</th>
			<th>作業者</th>
		</thead>
		<tbody>
			@foreach($reports as $report)
			<tr>
				<td>{{$report->rp_date}}</td>
				<td><a href="{{route('reportShow', ['id' => $report->id])}}">{{Str::limit($report->rp_content, 20, '...')}}</a>
				</td>
				<td>{{$report->user->us_name}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row justify-content-center d-flex">
		{{ $reports->links('pagination::bootstrap-4') }}
	</div>
</div>
@endsection
