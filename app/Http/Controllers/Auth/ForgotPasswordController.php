<?php

namespace TridentSDK\Http\Controllers\Auth;

use TridentSDK\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset emails and
	| includes a trait which assists in sending these notifications from
	| your application to your users. Feel free to explore this trait.
	|
	*/
	use SendsPasswordResetEmails;

	public function __construct(){
		$this->middleware('guest');
	}

	protected function sendResetLinkResponse($response){
		return back()->with('reset-sent', trans($response));
	}

}