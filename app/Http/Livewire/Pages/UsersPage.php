<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsersPage extends Component
{
    public User $user;
    public $password;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email|unique:users,email',
        'user.role' => 'required'
    ];
    public $userId;
    public function mount()
    {
        $this->user = new User();
    }
    public function editUser(User $user)
    {
        $this->user = $user;
    }

    public function deleteItem()
    {
        $user = User::findOrFail($this->userId);
        $user->delete();
    }
    
    public function updateUser()
    {
        if($this->password){
            $this->user->password = Hash::make($this->password);
        }
        $this->user->save();
        $this->user = new User();
        $this->password = '';
    }

    public function render()
    {
        $users = User::query();

        $users = $users->paginate(10);
        return view('livewire.pages.users-page',compact('users'))->layout('layouts.admin');
    }
}
