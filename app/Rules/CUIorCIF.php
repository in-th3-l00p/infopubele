<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Closure;

class CUIorCIF implements ValidationRule
{
    private static $controlKey = [7, 5, 3, 2, 1, 7, 5, 3, 2];

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_numeric($value)) {
            $fail('CUI/CIF invalid.');
            return;
        }
        if ((int) $value <= 0) {
            $fail('CUI/CIF invalid.');
            return;
        }
        $cifLength = strlen($value);
        if ($cifLength > 10) {
            $fail('CUI/CIF invalid.');
            return;
        }
        if ($cifLength < 2) {
            $fail('CUI/CIF invalid.');
            return;
        }

        $controlKey = (int) substr($value, -1);
        $cif = substr($value, 0, -1);
        $cif = str_pad($cif, 9, '0', STR_PAD_LEFT);
        $suma = 0;
        foreach (self::$controlKey as $i => $key) {
            $suma += $cif[$i] * $key;
        }
        $suma = $suma * 10;
        $rest = (int) ($suma % 11);
        $rest = ($rest == 10) ? 0 : $rest;

        if ($rest !== $controlKey) {
            $fail('CUI/CIF invalid.');
        }
    }
}
