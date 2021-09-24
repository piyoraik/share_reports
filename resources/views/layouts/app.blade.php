<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<script src="{{ asset('/js/app.js') }}"></script>
	<title>SHARE REPORTS</title>
</head>

<body>
	<x-header>{{ $user }}</x-header>
	<div class="container">
		<div class="mt-5">
			@yield('content')
		</div>
	</div>
</body>

</html>
