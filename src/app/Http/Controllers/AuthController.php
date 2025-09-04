<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\alert;
use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSub(Request $request)
    {
        $userModel = new User();

        $request->validate(
            [
                'text_username' => 'required|email',
                'text_password'  => 'required|min:6|max:12'
            ],
            [
                'text_username.required' => 'Username is Required',
                'text_username.email' => 'Invalid Email',
                'text_password.required' => 'Password is Required',
                'text_password.min' => 'Invalid Password',
                'text_password.max' => 'Invalid Password',
            ]
            );

        $username = $request->input('text_username');
        $password = $request->input('text_password');


        $user = User::where('username', $username)
                    ->where('deleted_at', NULL)
                    ->first();

        if(!$user){
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Wrong Username/Password combination');
        }
        
        if(!password_verify($password, $user->password)){
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'Wrong Username/Password combination');
        }

        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        session([
            'user' =>   [ 
                'id'        => $user->id,
                'username'  => $user->username
            ]  
        ]);

        return redirect()->to('/');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->to('/login');
    }
}
