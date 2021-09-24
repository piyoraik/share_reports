<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
	// GET /login
	public function gologin()
	{
		return view("auth.login");
	}

	// POST /login
	public function login(Request $request)
	{
		$isRedirect = false;
		$templatePath = "auth.login";
		$assign = [];

		$loginEmail = $request->input("loginEmail");
		$loginPw = $request->input("loginPw");
		$validationMsgs = [];
		if(empty($validationMsgs)) {
			$user = User::where('us_mail', $loginEmail)->first();
			if($user == null) {
				$validationMsgs[] = "存在しないIDです。正しいIDを入力してください。";
			}
			else {
				$userPw = $user->us_password;
				if(password_verify($loginPw, $userPw)) {
					$session = $request->session();
					$session->put("loginFlg", true);
					$session->put("id", $user->id);
					$session->put("email", $user->us_mail);
					$session->put("auth", 1);
					$isRedirect = true;
				}
				else {
					$validationMsgs[] = "パスワードが違います。正しいパスワードを入力してください。";
				}
			}
		}
		if($isRedirect) {
				$response = redirect(route('reportIndex'));
			}
			else {
				if(!empty($validationMsgs)) {
					$assign["validationMsgs"] = $validationMsgs;
					$assign["loginEmail"] = $loginEmail;
				}
				$response = view($templatePath, $assign);
			}
			return$response;
	}

	// POST /logout
	public function logout(Request $request)
	{
			$session = $request->session();
			$session->flush();
			$session->regenerate();
			return redirect(route('getlogin'));
	}
}
