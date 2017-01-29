<?php

namespace TridentSDK\Http\Controllers;

use Auth;
use Captcha\Captcha;
use Illuminate\Hashing\BcryptHasher;
use Request;
use TridentSDK\Http\Requests\LoginUserRequest;
use TridentSDK\Http\Requests\RegisterUserRequest;
use TridentSDK\Http\Requests\UserSettingsRequest;
use TridentSDK\User;

class AuthController extends Controller {

    public function register(RegisterUserRequest $request){
        $captcha = new Captcha();
        $captcha->setPublicKey(env("RECAPTCHA_PUBLIC"));
        $captcha->setPrivateKey(env("RECAPTCHA_SECRET"));
        $response = $captcha->check(Request::get("g-recaptcha-response"));

        if($response->isValid()){
            if(User::where("username", "=", Request::get("username"))->count() == 0){
                if(User::where("email", "=", Request::get("email"))->count() == 0){
                    $validation_code = self::generateRandom(16);

                    $user = User::create([
                        'username' => Request::get("username"),
                        'email' => Request::get("email"),
                        'password' => bcrypt(Request::get("password")),
                        'validation_code' => $validation_code,
                        'token' => self::generateRandom(32),
                        'rehashed' => true
                    ]);

                    self::sendValidationEmail(Request::get("email"), Request::get("username"), $user->id, $validation_code);

                    return redirect()->back()->with("registered", true);
                }else{
                    return redirect()->back()->withErrors("This email is already taken.", "register");
                }
            }else{
                return redirect()->back()->withErrors("This username is already taken.", "register");
            }
        }else{
            return redirect()->back()->withErrors("Invalid Captcha.", "register");
        }
    }

    public function login(LoginUserRequest $request){
        $user = User::where("username", "=", Request::get("username"))->first();
        if($user){
            if(!$user->rehashed){
                $oldHash = hash("sha256", crypt(md5(Request::get("password")), $user->salt));
                if($user->password == $oldHash){
                    $user->password = (new BcryptHasher())->make(Request::get("password"));
                    $user->rehashed = true;
                    $user->save();
                }
            }

            if(\Auth::attempt(["username" => Request::get("username"), "password" => Request::get("password")], Request::has("remember"))){
                return redirect()->back();
            }else{
                return redirect()->withErrors("Invalid password.", "login");
            }
        }else{
            return redirect()->back()->withErrors("Username not found.", "login");
        }
    }

	public function settings(UserSettingsRequest $request, $id){
		$user = User::find($id);

		if(!$user){
			return redirect("/404");
		}

		if(!Auth::check()){
			return redirect("/404");
		}

		if(!Auth::getUser()->canEdit($user)){
			return redirect("/404");
		}

		if(!Auth::validate(["username" => Auth::user()->username, "password" => Request::get("current-password")])){
			return redirect()->back()->withErrors("Invalid Password.", "settings");
		}

		if(!empty(Request::get("new-email"))){
			$user->email = Request::get("new-email");
		}

		if(!empty(Request::get("new-password"))){
			$user->password = bcrypt(Request::get("new-password"));
			$user->rehashed = true;
		}

		$user->save();

		return redirect()->back()->with("accepted", true);
	}

    public function logout(){
        \Auth::logout();
        return redirect()->back();
    }

	public function generateRandom($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $salt = '';
        for($i = 0; $i < $length; $i++){
            $salt .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $salt;
    }

	public function sendValidationEmail($to, $username, $id, $code){
        $message = view("emails.validation", array(
        	"username" => e($username),
	        "id" => $id,
	        "code" => $code
        ));

        self::sendMail($to, "Email Validation for ".e($username), $message);
    }

	public function sendMail($recipients, $subject, $message, $from = "TridentSDK <noreply@tsdk.xyz>"){
        $to  = "";

        if(is_array($recipients)){
            foreach($recipients as $r){
                if($to != "") $to .= ", ";
                $to .= $r;
            }
        }else{
            $to = $recipients;
        }

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: '. $from . "\r\n";

        mail($to, $subject, $message, $headers);
    }

}
