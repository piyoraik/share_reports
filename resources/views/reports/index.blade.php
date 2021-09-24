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
				<td>{{Str::limit($report->rp_content, 20, '...')}}</td>
				<td>{{$report->user->us_name}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
