<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Captcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

//     public function passes($attribute, $value)
//     {
//         return $value === session('captcha');
//     }

//     public function message()
//     {
//         return 'Invalid captcha.';
//     }
}
