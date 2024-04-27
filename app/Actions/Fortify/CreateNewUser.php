<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],
        [
            'name.required' => 'Numele este obligatoriu',
            'email.required' => 'Emailul este obligatoriu',
            'password.required' => 'Parola este obligataorie',
            'terms.accepted' => 'Trebuie să accepți termenii și condițiile',
            'email.email' => 'Emailul trebuie să fie valid',
            'email.unique' => 'Emailul este deja folosit',
            'password.min' => 'Parola trebuie să aibă cel puțin :min caractere',
        ])->validate();


        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
