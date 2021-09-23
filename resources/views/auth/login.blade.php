@extends('layouts.app')
@section('content')
<div class="row">
	<h1>ログイン</h1>
	@isset($validationMsgs)
	<section id="errorMsg">
		<p>以下のメッセージをご確認ください。</p>
		<ul>
			@foreach($validationMsgs as $msg)
			<li>{{$msg}}</li>
			@endforeach
		</ul>
	</section>
	@endisset
	<section>
		<p>
			メールアドレスとパスワードを入力し、ログインをクリックしてください。
		</p>
		<form action="/login" method="post">
			@csrf
			<dl>
				<dt>メールアドレス</dt>
				<dd>
					<input type="email" id="loginEmail" name="loginEmail" value="{{$loginEmail ?? ""}}" required>
				</dd>
				<dt>パスワード</dt>
				<dd>
					<input type="password" id="loginPw" name="loginPw" required>
				</dd>
			</dl>
			<button type="submit">ログイン</button>
		</form>
	</section>
</div>
@endsection
