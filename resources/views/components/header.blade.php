<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="{{route('reportIndex')}}">SHARE REPORTS</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
		aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div>
			ようこそ <b>{{ $slot }}</b>さん
		</div>
		<div class="navbar-nav">
			<a class="nav-item nav-link" href="{{route('reportIndex')}}">Index</a>
			<a class="nav-item nav-link" href="{{route('reportAdd')}}">Add</a>
			<form method="post" name="headerform" action="{{route('logout')}}">
				@csrf
				<a href="javascript: headerform.submit()" class="nav-item nav-link">Logout</a>
			</form>
		</div>
	</div>
</nav>
