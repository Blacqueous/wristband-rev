<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    protected $guard = 'admin';

    protected $redirectAfterLogout = '/admin/login';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name'=>'required|alpha|min:2',
            'email'=>'required|email|unique:admin',
            'password'=>'required|between:6,12|confirmed|regex:/^[A-Za-z0-9@!#\$%\^&\*]+$/'
        ]);
    }

    /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return User
    */
    public function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
    * Display a new user instance after a valid registration.
    *
    */
    public function showLoginForm()
    {
        if(Auth::guard($this->guard)->check()) {
            return redirect('/admin');
        }

        return view('admin.auth.login');
    }

    public function showRegistrationForm()
    {
        if(Auth::guard($this->guard)->check()) {
            return redirect('/admin');
        }

        return view('admin.auth.register');
    }
}
