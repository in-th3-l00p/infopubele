<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePasswordForm extends Component
{
    public string $current;
    public string $password;
    public string $password_confirmation;

    public function updatePassword() {
        $this->validate([
            "current" => "required",
            "password" => "required|confirmed|min:8",
        ]);

        if (!Hash::check($this->current, auth()->user()->password)) {
            $this->addError("current", "Current password is incorrect");
            return;
        }

        auth()->user()->update([
            "password" => bcrypt($this->password),
        ]);
    }


    public function render()
    {
        return view('livewire.update-password-form');
    }
}
