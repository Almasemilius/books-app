<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Livewire\Component;

class UsersPage extends Component
{
    public User $user;

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
    public function editProduct(User $user)
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
        $this->user->save();
        $this->user = new User();
    }

    public function render()
    {
        $users = User::query();

        $users = $users->paginate(10);
        return view('livewire.pages.users-page',compact('users'));
    }
}
