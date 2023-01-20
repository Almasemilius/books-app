<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginPage extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required'
    ];

    public function login()
    {
        $this->validate();
        $credentials = ['email' => $this->email, 'password' => $this->password];
        // dd(Auth::attempt($credentials));
        if(Auth::attempt($credentials)){
            $user = User::where('email', $this->email)->first();
            Auth::login($user);
            if($user->role == 'admin'){
                return redirect()->intended('/');
            }else{
                return redirect()->intended('/');
            }
        }else{
            $this->addError('failed-auth' , 'Wrong Credentials');
        }
    }
    public function render()
    {
        return view('livewire.pages.login-page');
    }
}
