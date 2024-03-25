<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;

class CreateDevice extends Component
{
    public string $name;
    public string $city;

    public function render() {
        return view('livewire.create-device');
    }

    public function createDevice() {
        if(auth()->user()->role==="admin")
        {
            $this->validate([
                'name' => 'required|min:1|max:255|unique:devices,name',
                'city' => 'required|min:1|max:255',
            ],[
                'city.required' => 'Orașul este obligatoriu.',
                'name.required' => 'Numele este obligatoriu.',
            ]);

            Device::create([
                'name' => $this->name,
                'city' => $this->city,
            ]);

            return redirect()->route('devices.index')->with([
                "success" => "Dispozitiv creat cu succes."
            ]);
        }
        elseif(auth()->user()->role==="uat")
        {
            $this->validate([
                'name' => 'required|min:1|max:255|unique:devices,name',
            ],[
                'name.required' => 'Numele este obligatoriu.',
            ]);

            Device::create([
                'name' => $this->name,
                'city' => auth()->user()->city,
            ]);

            return redirect()->route('uat.devices.index')->with([
                "success" => "Dispozitiv creat cu succes."
            ]);
        }


    }
}
