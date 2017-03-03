<?php

namespace TridentSDK\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use TridentSDK\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/
	use ResetsPasswords;

	protected $redirectTo = '/';

	public function __construct(){
		$this->middleware('guest');
	}

}