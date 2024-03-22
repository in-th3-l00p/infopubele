<?php

namespace App\Livewire;

use App\Models\Association;
use App\Models\Device;
use Livewire\Component;

class CreateAssociation extends Component
{
    public string $device_id;
    public string $address;
    public string $city;

    public string $fiscal_code;
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
        $device= Device::find($this->device_id);
        $this->validate([
            'address' => 'required|min:1|max:255',
            'city' => 'required|min:1|max:255',
            'fiscal_code' => 'required',
            'person_name' => 'required|min:1|max:255',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email:rfc,dns|max:255',
            'inhabitants' => 'required|numeric',
        ], [
            'address.required' => 'Adresa este obligatorie.',
            'city.required' => 'Orașul este obligatoriu.',
            'person_name.required' => 'Persoana de contact este obligatorie.',
            'fiscal_code.required' => 'Codul fiscal este obligatoriu.',
            'phone.required' => 'Telefonul este obligatoriu.',
            'phone.numeric' => 'Telefonul trebuie să fie numeric.',
            'phone.digits' => 'Telefonul trebuie să aibă 10 cifre.',
            'email.required' => 'Emailul este obligatoriu.',
            'email.email' => 'Emailul trebuie să fie valid.',
            'inhabitants.required' => 'Numărul de locuitori este obligatoriu.',
        ]);

        $association = Association::create([
            'address' => $this->address,
            'city' => $this->city,
            'fiscal_code' => $this->fiscal_code,
            'person_name' => $this->person_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'inhabitants' => $this->inhabitants,
            'device_id' => $device->id,
        ]);

        redirect(route('associations.index'))->with([
            "success" => "Asociație creată cu succes."
        ]);
    }
}
