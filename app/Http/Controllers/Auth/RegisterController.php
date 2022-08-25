<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
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
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
          $messages = [
            'contactno.required' => 'Contact number field is required',
            'birthdate.before' => 'Invalid birth date',
        ];
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' =>['required'],
            'birthdate' => ['required', 'before:today'],
            'address' => ['required'],
            'gender' => ['required'],
            'contactno' => ['required'],
        ],$messages);
      
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new \App\User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->roles_id = $data['role'];
        $user->save();
        $userinfo = new \App\UserInfo;
        $userinfo->birth_date = $data['birthdate'];
        $userinfo->address = $data['address'];
        $userinfo->gender = $data['gender'];
        $userinfo->users_id = User::latest()->first()->id;
        $userinfo->contact_no = $data['contactno'];
        $userinfo->save();
        return view('welcome');
    }
}
