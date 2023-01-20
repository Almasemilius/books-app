<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterPage extends Component
{
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'passwordConfirm' => 'required',
    ];
    public $name;
    public $email;
    public $password;
    public $passwordConfirm;

    public function register()
    {
        $this->validate();
        if($this->password == $this->passwordConfirm){
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);
            return redirect()->route('login');
        }else{
            $this->addError('passwordConfirm', 'Passwords must match');
        }

    }
    public function render()
    {
        return view('livewire.pages.register-page');
    }
}
