<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'sname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30','unique:users'],
            'birth' => ['required', 'string', 'max:255'],
            'otchestvo' => ['required', 'string', 'max:255'],
            'spec' => ['required', 'string', 'max:255'],
            'whoIs' => ['required', 'string', 'max:255'],
            'education_org' => ['required', 'string', 'max:255'],

            // 'phone' => ['required', 'string', 'max:11'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'sname' => $data['sname'],
            'otchestvo' => $data['otchestvo'],
            'phone' => $data['phone'],
            'spec' => $data['spec'],
            'whoIs' => $data['whoIs'],
            'education_org' => $data['education_org'],
            'birth' => $data['birth'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
