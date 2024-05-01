<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ONRCNumberValidation implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the format is correct
        if (!preg_match('/^[JFC]\/([1-9]|[1-3][0-9]|40|51|52)\/[0-9]+\/[0-9]+$/', $value)) {
            $fail('The ONRC number is not valid.');
            return;
        }

        // Split the ONRC number into its components
        $parts = explode('/', $value);

        // Check the first letter (legal entity type)
        if ($parts[0] != 'J' && $parts[0] != 'F' && $parts[0] != 'C') {
            $fail('The ONRC number is not valid.');
            return;
        }

        // Check if the county code is valid
        $countyCode = intval($parts[1]);
        if (($countyCode < 1 || $countyCode > 40) && $countyCode != 51 && $countyCode != 52) {
            $fail('The ONRC number is not valid.');
            return;
        }

        // Check if the order number is numeric and positive
        if (!ctype_digit($parts[2]) || intval($parts[2]) < 1) {
            $fail('The ONRC number is not valid.');
            return;
        }

        // Check if the year of establishment is numeric and within a reasonable range (e.g., 1900 to current year)
        if (!ctype_digit($parts[3]) || intval($parts[3]) < 1900 || intval($parts[3]) > date('Y')) {
            $fail('The ONRC number is not valid.');
            return;
        }
    }
}
