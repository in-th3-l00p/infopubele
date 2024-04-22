<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nume' => 'required|max:255',
            'prenume' => 'required|max:255',
            'email'=>'required|email:rfc,dns|max:255',
            'numar-de-telefon'=>'required|max:255',
            'mesaj'=>'required|max:3000'
        ];
    }





}
