<?php

namespace App\Livewire;

use App\Models\Association;
use App\Models\Device;
use Livewire\Component;

class CreateAssociation extends Component
{
    public string $address;
    public string $city;
    public string $device_id;
    public string $fiscal_code;
    public string $person_name;
    public string $phone;
    public string $email;
    public int $inhabitants;
    public function render()
    {
        return view('livewire.create-association');
    }

    function validateCIF($cif){
        // Daca este string, elimina atributul fiscal si spatiile
        if(!is_int($cif)){
            $cif = strtoupper($cif);
            if(strpos($cif, 'RO') === 0){
                $cif = substr($cif, 2);
            }
            $cif = (int) trim($cif);
        }

        // daca are mai mult de 10 cifre sau mai putin de 2, nu-i valid
        if(strlen($cif) > 10 || strlen($cif) < 2){
            return false;
        }
        // numarul de control
        $v = 753217532;

        // extrage cifra de control
        $c1 = $cif % 10;
        $cif = (int) ($cif / 10);

        // executa operatiile pe cifre
        $t = 0;
        while($cif > 0){
            $t += ($cif % 10) * ($v % 10);
            $cif = (int) ($cif / 10);
            $v = (int) ($v / 10);
        }

        // aplica inmultirea cu 10 si afla modulo 11
        $c2 = $t * 10 % 11;

        // daca modulo 11 este 10, atunci cifra de control este 0
        if($c2 == 10){
            $c2 = 0;
        }
        return $c1 === $c2;
    }

    public function createAssociation()
    {
        $this->validate([
            'address' => 'required|min:1|max:255',
            'city' => 'required|min:1|max:255',
            'fiscal_code' => 'required|max:13',
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

        if ($this->validateCIF($this->fiscal_code) === false) {
            return redirect(route('associations.create'))->with([
                "error" => "Codul fiscal nu este valid."
            ]);
        }

        $association = Association::create([
            'address' => $this->address,
            'city' => $this->city,
            'fiscal_code' => $this->fiscal_code,
            'person_name' => $this->person_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'inhabitants' => $this->inhabitants,
            'device_id' => $this->device_id,
        ]);

        redirect(route('associations.index'))->with([
            "success" => "Asociație creată cu succes."
        ]);
    }
}
