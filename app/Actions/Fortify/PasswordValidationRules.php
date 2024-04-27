<?php

namespace App\Actions\Fortify;

use Illuminate\Validation\Rules\Password;

trait PasswordValidationRules
{
    /**
     * Get the validation rules used to validate passwords.
     *
     * @return array<int, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function passwordRules(): array
    {
        return ['required', 'string', Password::default(), 'confirmed'];
    }


    /**
     * Get the password validation error messages.
     *
     * @return array
     */
    protected function passwordValidationMessages(): array
    {
        return [
            'required' => 'Câmpul parolă este obligatoriu.',
            'string' => 'Parola trebuie să fie un șir de caractere.',
            'confirmed' => 'Confirmarea parolei nu se potrivește.',
        ];
    }
}
