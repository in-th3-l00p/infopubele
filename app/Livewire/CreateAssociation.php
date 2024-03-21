<?php

namespace App\Livewire;

use App\Models\Association;
use App\Models\Device;
use Livewire\Component;

class CreateAssociation extends Component
{
    public string $address;
    public string $city;
    public Device $device;
    public int $fiscal_code;
    public string $person_name;
    public string $phone;
    public string $email;
    public int $inhabitants;
    public function render()
    {
        return view('livewire.create-association');
    }

    public function createAssociation()
    {
        $this->validate([
            'address' => 'required|min:1|max:255',
            'city' => 'required|min:1|max:255',
            'fiscal_code' => 'required|numeric',
            'person_name' => 'required|min:1|max:255',
            'phone' => 'required|min:1|max:255',
            'email' => 'required|email',
            'inhabitants' => 'required|numeric',
        ], [
            'address.required' => 'Adresa este obligatorie.',
            'city.required' => 'Orașul este obligatoriu.',
            'fiscal_code.required' => 'Codul fiscal este obligatoriu.',
            'person_name.required' => 'Persoana de contact este obligatorie.',
            'phone.required' => 'Telefonul este obligatoriu.',
            'email.required' => 'Emailul este obligatoriu.',
            'inhabitants.required' => 'Numărul de locuitori este obligatoriu.',
        ]);

        Association::create([
            'address' => $this->address,
            'city' => $this->city,
            'fiscal_code' => $this->fiscal_code,
            'person_name' => $this->person_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'inhabitants' => $this->inhabitants,
        ]);

        redirect(route('associations.index'))->with([
            "success" => "Asociație creată cu succes."
        ];
    }
}
