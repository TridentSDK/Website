<?php

namespace TridentSDK\Http\Controllers;

use Captcha\Captcha;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Hashing\BcryptHasher;
use Request;
use TridentSDK\Http\Requests\LoginUserRequest;
use TridentSDK\Http\Requests\RegisterUserRequest;
use TridentSDK\User;

class AuthController extends Controller {

    use AuthenticatesAndRegistersUsers;

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

    public function logout(){
        \Auth::logout();
        return redirect()->back();
    }

    static function generateRandom($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $salt = '';
        for($i = 0; $i < $length; $i++){
            $salt .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $salt;
    }

    static function sendValidationEmail($to, $username, $id, $code){
        $message = '<table style="border:1px solid #ddd" cellspacing="0" cellpadding="0">
<tbody><tr>
  <td style="padding:10px 10px;background-color:#008cba">
    <a href="https://tridentsdk.net/" target="_blank">
      <span style="float: left;padding: 12px 15px;font-size: 19px;line-height: 21px;font-family: \'Open Sans\',\'Helvetica Neue\',Helvetica,Arial,sans-serif;color: #ffffff;font-size: 30px;">TridentSDK</span>
    </a>
  </td>
</tr>
<tr>
  <td style="background-color:#fff;padding:10px 10px;font-family:Arial,Helvetica,sans-serif;font-size:14px">

      <hr style="background-color:#ddd;min-height:1px;border:1px">
      <h3 style="margin:15px 0 20px 0">Email Validation for '.e($username).'</h3>


          <span style="text-decoration:none;font-weight:bold;color:#006699;text-decoration:none;font-weight:bold;color:#006699;margin-right:5px" target="_blank">For full site access you have to click on the button below.</span>

          <div style="margin-left:15px;margin-top:20px;max-width:694px">
            <a style="color: #fff; text-decoration: none" href="https://tridentsdk.net/validate/'.$code.'/'.$id.'/"><div style="border-radius: 100px; background: #6DCCEC; width: 90%; padding: 10px; text-align: center">Validate Email Address</div></a><br />
          </div>

          <span style="text-decoration:none;font-weight:bold;color:#006699;text-decoration:none;font-weight:bold;color:#006699;margin-right:5px" target="_blank">This will validate your email address.</span>

  <hr style="background-color:#ddd;min-height:1px;border:1px">

  </td>
</tr>
</tbody></table>';

        self::sendMail($to, "Email Validation for ".e($username), $message);
    }

    static function sendMail($recipients, $subject, $message, $from = "TridentSDK <noreply@tridentsdk.net>"){
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
