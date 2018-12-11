<?php

namespace App\Http\Controllers\Auth;

use App\Handlers\YunpianCaptchaHandler;
use App\Lib\ApiRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'token' => 'required|string',
            'authenticate' => 'required|string'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     */
    protected function create(array $data)
    {
        $yp = new YunpianCaptchaHandler();
        $result = $yp->setParams([
            'captchaId' => \Config('yunpian.captchaId'),
            'token' => $data['token'],
            'authenticate' => $data['authenticate'],
            'secretId' => \Config('yunpian.secretId'),
            'version' => '1.0',
            'timestamp' => time(),
            'nonce' => random_int(1,99999)
        ])->setSignature()->getResult();
        if (0 === $result['code'])
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        else
            return "验证失败";
    }
}
