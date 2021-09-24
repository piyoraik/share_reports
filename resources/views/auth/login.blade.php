@extends('layouts.guest')
@section('content')
<div class="card mb-3 bg-secondary text-white">
	<div class="card-header">
		<h1>ログイン</h1>
	</div>
	@isset($validationMsgs)
	<section class="alert alert-danger">
		<p>以下のメッセージをご確認ください。</p>
		<ul>
			@foreach($validationMsgs as $msg)
			<li>{{$msg}}</li>
			@endforeach
		</ul>
	</section>
	@endisset
	<section>
		<p>メールアドレスとパスワードを入力し、ログインをクリックしてください。</p>
		<div class="col-md-12">
			<form action="{{ route('postlogin') }}" method="post">
				@csrf
				<div class="row mt-3">
					<label for="loginEmail">メールアドレス</label>
					<input type="email" id="loginEmail" name="loginEmail" value="{{$loginEmail ?? "" }}" class="form-control"
						required>
				</div>
				<div class="row mt-3">
					<label for="loginPw">パスワード</label>
					<input type="password" id="loginPw" name="loginPw" class="form-control" required>
				</div>
				<div class="row mt-3">
					<button type="submit" class="btn btn-success col-md-12">ログイン</button>
				</div>
		</div>
		</form>
</div>
</section>
</div>
@endsection
