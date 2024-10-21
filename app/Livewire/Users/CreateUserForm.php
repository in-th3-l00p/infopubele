<?php

namespace App\Livewire\Users;

use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\On;
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
            'city' => '',
            'role' => ''
        ];
        if (auth()->user()->role !== "admin")
            $this->state["city"] = auth()->user()->city;
    }

    public function createUser() {
        Validator::make($this->state, [
            'name' => 'required|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:8|max:255',
            'city' => 'required|max:255',
            'role' => 'required|in:' . implode(',', config("constants.roles"))
        ])->validate();
        if (
            $this->state['role'] == 'admin' &&
            auth()->user()->role !== 'admin'
        ) {
            $this->addError("role", __("Nu aveți permisiunea să creați un utilizator cu rol de administrator!"));
            return;
        }
        if (
            auth()->user()->role !== "admin" &&
            $this->state["city"] !== auth()->user()->city
        ) {
            $this->addError("city", __("Nu aveți permisiunea să creați un utilizator în alt oraș!"));
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

        // if role is user, the user might have a device linked to him
        if (
            $this->state["role"] === "user" &&
            Device::query()->where("id", "=", $this->state["device"])
        ) {
            // uat can only give devices from his city
            if (
                auth()->user()->role !== "admin" &&
                Device::query()
                    ->where("id", "=", $this->state["device"])
                    ->first()
                    ->city !== auth()->user()->city
            ) {
                $this->addError("device", __("Nu aveți permisiunea să selectați acest dispozitiv!"));
                return;
            }
            $user->update([
                'device_id' => $this->state["device"]
            ]);
        }


        session()->flash('success', __("Utilizatorul a fost adăugat cu succes!"));
        $this->redirectRoute(auth()->user()->role . '.users.index');
    }

    public function render()
    {
        return view('livewire.users.create-user-form');
    }
}
