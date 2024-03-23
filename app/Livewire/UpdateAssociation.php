<?php

namespace App\Livewire;

use App\Models\Association;
use App\Models\Device;
use Livewire\Component;

class UpdateAssociation extends Component
{
    public Association $association;
    public string $address;
    public string $city;
    public string $fiscal_code;
    public string $device_id;
    public string $person_name;
    public string $phone;
    public string $email;
    public int $inhabitants;
    public bool $updated = false;

    public function mount() {
        $this->address = $this->association->address;
        $this->city = $this->association->city;
        $this->fiscal_code = $this->association->fiscal_code;
        $this->device_id = $this->association->device_id;
        $this->person_name = $this->association->person_name;
        $this->phone = $this->association->phone;
        $this->email = $this->association->email;
        $this->inhabitants = $this->association->inhabitants;
    }
    public function render()
    {
        return view('livewire.update-association');
    }

    public function updateAssociation()
    {
        $this->validate([
            'address' => [
                'required',
                'min:1',
                'max:255',
                'unique:associations,address,' . $this->association->id . ',id,city,' . $this->city,
            ],
            'city' => 'required|min:1|max:255',
            'fiscal_code' => 'required|max:13|unique:associations,fiscal_code,' . $this->association->id,
            'person_name' => 'required|min:1|max:255',
            'phone' => 'required|numeric|digits:10|unique:associations,phone,' . $this->association->id,
            'email' => 'required|email:rfc,dns|max:255|unique:associations,email,' . $this->association->id,
            'inhabitants' => 'required|numeric',
            'device_id' => 'required|unique:associations,device_id,' . $this->association->id,
        ], [
            'address.unique' => 'Adresa trebuie să fie unică în oraș.',
            'fiscal_code.unique' => 'Codul fiscal este deja folosit pentru o asociație.',
            'phone.unique' => 'Telefonul este deja folosit pentru o asociație.',
            'email.unique' => 'Emailul este deja folosit pentru o asociație.',
            'device_id.unique' => 'Dispozitivul este deja asociat pentru o asociație..',
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

        $this->association->update([
            'address' => $this->address,
            'city' => $this->city,
            'fiscal_code' => $this->fiscal_code,
            'person_name' => $this->person_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'inhabitants' => $this->inhabitants,
            'device_id' => $this->device_id,
        ]);
        $this->updated = true;
    }
    public function closeUpdated() {
        $this->updated = false;
    }
}
