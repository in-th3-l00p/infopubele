<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class EditUserForm extends Component
{
    public User $user;
    public array $state = [ ];

    public function mount(User $user) {
        $this->user = $user;
        $this->state = [
            "name" => $user->name,
            "email" => $user->email,
            "city" => $user->city,
            "role" => $user->role
        ];
    }

    public function updateUser() {
        Validator::validate($this->state, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'city' => 'required|max:255',
            'role' => 'required|in:' . implode(',', config("constants.roles"))
        ]);
        if ($this->state["name"] !== $this->user->name)
            Validator::make($this->state, [
                'name' => 'unique:users,name',
            ])->validate();
        if ($this->state["email"] !== $this->user->email)
            Validator::make($this->state, [
                'email' => 'unique:users,email',
            ])->validate();
        if ($this->state['role'] == 'admin' && auth()->user()->role !== 'admin') {
            $this->addError("role", __("Nu aveți permisiunea să creați un utilizator cu rol de administrator!"));
            return;
        }
        if (auth()->user()->role === "admin")
            $this->user->update([
                'name' => $this->state['name'],
                'email' => $this->state['email'],
                'city' => $this->state['city'],
                'role' => $this->state["role"]
            ]);
        else
            $this->user->update([
                'name' => $this->state['name'],
                'email' => $this->state['email'],
                'role' => $this->state["role"]
            ]);
        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.users.edit-user-form');
    }
}
