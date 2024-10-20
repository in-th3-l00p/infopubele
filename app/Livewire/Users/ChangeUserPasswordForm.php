<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ChangeUserPasswordForm extends Component
{
    public User $user;
    public array $state = [ ];

    public function mount(User $user) {
        $this->user = $user;
        $this->state = [
            "password" => "",
            "password_confirmation" => "",
        ];
    }

    public function changePassword() {
        Validator::make($this->state, [
            'password' => 'required|min:8|confirmed',
        ])->validate();
        $this->user->update([
            'password' => Hash::make($this->state['password']),
        ]);
        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.users.change-user-password-form');
    }
}
