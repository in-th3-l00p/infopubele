<?php

namespace App\Rules;

use Closure;
use DateTime;
use Illuminate\Contracts\Validation\ValidationRule;

class CNP implements ValidationRule
{
    private const CONTROL_KEY = [2, 7, 9, 1, 4, 6, 3, 5, 8, 2, 7, 9];
    private const COUNTY_CODE = [
        '01' => 'Alba', '02' => 'Arad', '03' => 'Argeş', '04' => 'Bacău', '05' => 'Bihor', '06' => 'Bistriţa-Năsăud',
        '07' => 'Botoşani', '08' => 'Braşov', '09' => 'Brăila', '10' => 'Buzău', '11' => 'Caraş-Severin', '12' => 'Cluj',
        '13' => 'Constanţa', '14' => 'Covasna', '15' => 'Dâmboviţa', '16' => 'Dolj', '17' => 'Galaţi', '18' => 'Gorj',
        '19' => 'Harghita', '20' => 'Hunedoara', '21' => 'Ialomiţa', '22' => 'Iaşi', '23' => 'Ilfov', '24' => 'Maramureş',
        '25' => 'Mehedinţi', '26' => 'Mureş', '27' => 'Neamţ', '28' => 'Olt', '29' => 'Prahova', '30' => 'Satu Mare',
        '31' => 'Sălaj', '32' => 'Sibiu', '33' => 'Suceava', '34' => 'Teleorman', '35' => 'Timiş', '36' => 'Tulcea',
        '37' => 'Vaslui', '38' => 'Vâlcea', '39' => 'Vrancea', '40' => 'Bucureşti', '41' => 'Bucureşti Sector 1',
        '42' => 'Bucureşti Sector 2', '43' => 'Bucureşti Sector 3', '44' => 'Bucureşti Sector 4', '45' => 'Bucureşti Sector 5',
        '46' => 'Bucureşti Sector 6', '47' => 'Bucureşti Sector 7 (now defunct)', '48' => 'Bucureşti Sector 8 (now defunct)',
        '51' => 'Călăraşi', '52' => 'Giurgiu',
    ];

    private bool $isValid = false;
    private array $cnpArray = [];
    private int $year;
    private string $month = '';
    private string $day = '';
    private DateTime $date;
    private string $countyCode = '';

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $this->validateCNP((string)$value);

        if (!$this->isValid) {
            $fail('CNP-ul nu este valid.');
        }
    }

    private function validateCNP(string $cnp): void
    {
        if ((strlen($cnp) === 13) && ctype_digit($cnp)) {
            foreach (str_split($cnp) as $val) {
                $this->cnpArray[] = intval($val);
            }

            $this->setYear();
            $this->month = $this->cnpArray[3] . $this->cnpArray[4];
            $this->day = $this->cnpArray[5] . $this->cnpArray[6];
            $this->countyCode = $this->cnpArray[7] . $this->cnpArray[8];

            if ($this->checkDate() && $this->checkCounty()) {
                $this->isValid = $this->cnpArray[12] === $this->calculateHash();
            }
        }
    }

    private function setYear(): void
    {
        $year = ($this->cnpArray[1] * 10) + $this->cnpArray[2];
        $this->year = 0;

        if (in_array($this->cnpArray[0], [1, 2])) {
            $this->year = $year + 1900;
        } elseif (in_array($this->cnpArray[0], [3, 4])) {
            $this->year = $year + 1800;
        } elseif (in_array($this->cnpArray[0], [5, 6])) {
            $this->year = $year + 2000;
        } elseif (in_array($this->cnpArray[0], [7, 8])) {
            $this->year = $year + 2000;
            if ($this->year > (int)date('Y') - 14) {
                $this->year -= 100;
            }
        }
    }

    private function checkDate(): bool
    {
        $isDateValid = $this->checkYear() && $this->checkMonth() && $this->checkDay();

        if ($isDateValid) {
            $this->date = new DateTime("{$this->year}-{$this->month}-{$this->day} 00:00:00");
        }

        return $isDateValid;
    }

    private function checkYear(): bool
    {
        return ($this->year >= 1800) && ($this->year <= 2099);
    }

    private function checkMonth(): bool
    {
        $month = (int)$this->month;
        return ($month >= 1) && ($month <= 12);
    }

    private function checkDay(): bool
    {
        $day = (int)$this->day;

        if (($day < 1) || ($day > 31)) {
            return false;
        }

        if ($day > 28) {
            return checkdate((int)$this->month, $day, $this->year);
        }

        return true;
    }

    private function checkCounty(): bool
    {
        if (in_array($this->countyCode, ['47', '48'])) {
            $checkDate = new DateTime('1979-12-19 00:00:00');
            return $this->date <= $checkDate;
        }

        return array_key_exists($this->countyCode, self::COUNTY_CODE);
    }

    private function calculateHash(): int
    {
        $hashSum = 0;

        for ($i = 0; $i < 12; $i++) {
            $hashSum += $this->cnpArray[$i] * self::CONTROL_KEY[$i];
        }

        $hashSum = $hashSum % 11;

        if ($hashSum == 10) {
            $hashSum = 1;
        }

        return $hashSum;
    }
}
