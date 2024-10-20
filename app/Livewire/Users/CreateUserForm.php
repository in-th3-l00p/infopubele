<?php

namespace App\Livewire\Users;

use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class CreateUserForm extends Component
{
    public array $state = [];

    public function mount() {
        $this->state = [
            'name' => '',
            'email' => '',
            'password' => '',
            'password_confirmation' => '',
            'city' => auth()->user()->city,
            'role' => ''
        ];
    }

    public function createUser() {
        Validator::make($this->state, [
            'name' => 'required|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:8|max:255',
            'city' => 'required|max:255',
            'role' => 'required|in:' . implode(',', config("constants.roles"))
        ])->validate();
        if ($this->state['role'] == 'admin' && auth()->user()->role !== 'admin') {
            $this->addError("role", __("Nu aveți permisiunea să creați un utilizator cu rol de administrator!"));
            return;
        }
        $user = User::create([
            'name' => $this->state['name'],
            'email' => $this->state['email'],
            'city' => $this->state['city'],
            'password' => Hash::make($this->state['password']),
            'owner_id' => auth()->id(),
            'role' => $this->state["role"]
        ]);

        session()->flash('success', __("Utilizatorul a fost adăugat cu succes!"));
        $this->redirectRoute(auth()->user()->role . '.users.index');
    }

    public function render()
    {
        return view('livewire.users.create-user-form');
    }
}
