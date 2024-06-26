<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;

class CreateDevice extends Component
{
    public string $name;
    public string $city;
    public ?string $error = null;
    public string $series;


    public function render()
    {
        return view('livewire.create-device');
    }

    public function createDevice()
    {
        if (auth()->user()->role === "admin") {
            $this->validate([
                'name' => 'required|min:1|max:255|unique:devices,name',
                'city' => 'required|min:1|max:255',
                'series' => 'required|max:255|unique:devices,series',
            ], [
                'name.required' => 'Numele este obligatoriu.',
                'name.unique' => 'Numele trebuie sa fie unic.',
                'name.max' => 'Numele trebuie sa aibă maxim 255 de caractere.',
                'name.min' => 'Numele trebuie sa aibă minim 1 caracter.',

                'city.min' => 'Orașul trebuie sa aibă minim 1 caracter.',
                'city.required' => 'Orașul este obligatoriu.',
                'city.max' => 'Orașul trebuie sa aibă maxim 255 de caractere.',

                'series.required' => 'Seria este obligatorie.',
                'series.max' => 'Seria trebuie sa aibă maxim 255 de caractere.',
                'series.unique' => 'Seria trebuie sa fie unica.',
            ]);

            Device::create([
                'name' => $this->name,
                'city' => $this->city,
                'series' => $this->series,
            ]);

            return redirect()->route('devices.index')->with([
                "success" => "Dispozitiv creat cu succes."
            ]);
        } elseif (auth()->user()->role === "uat") {
            $this->validate([
                'name' => 'required|min:1|max:255|unique:devices,name',
                'series' => 'required|max:255|unique:devices,series',
            ], [
                'name.required' => 'Numele este obligatoriu.',
                'name.unique' => 'Numele trebuie sa fie unic.',
                'name.max' => 'Numele trebuie sa aibă maxim 255 de caractere.',
                'name.min' => 'Numele trebuie sa aibă minim 1 caracter.',

                'series.required' => 'Seria este obligatorie.',
                'series.max' => 'Seria trebuie sa aibă maxim 255 de caractere.',
                'series.unique' => 'Seria trebuie sa fie unica.',
            ]);

            if (auth()->user()->city === null) {
                return redirect()->route('uat.devices.create')->with([
                    "error" => "Nu aveti un oras setat."
                ]);
            } else {
                Device::create([
                    'name' => $this->name,
                    'city' => auth()->user()->city,
                    'series' => $this->series,
                ]);

                return redirect()->route('uat.devices.index')->with([
                    "success" => "Dispozitiv creat cu succes."
                ]);
            }
        } else {
            return redirect()->route('welcome');
        }
    }
}
