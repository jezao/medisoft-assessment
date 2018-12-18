<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CardRange implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $isRange = boolval(preg_match("/[HSDC][AQJK1-9]0?-[HSDC][AQJK1-9]0?/", $value));
        $isSingle = boolval(preg_match("/[HSDC][AQJK1-9]0?/", $value)) && strlen($value) == 2;
        $isSameSuit = false;

        if ($isRange) {
            $cards = explode('-', $value);
            $isSameSuit = ($cards[0]{0} == $cards[1]{0});
        }


        if (($isRange && $isSameSuit) || $isSingle) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
