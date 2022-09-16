<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Roles implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $rolesIDs = array(1, 2, 3, 4);
        if(in_array($value, $rolesIDs)){
            return true;
        }else{return false;}
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El Rol debe ser valido.';
    }
}
