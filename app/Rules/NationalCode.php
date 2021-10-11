<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class NationalCode implements Rule
{
    protected $message;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($messageFail)
    {
        $this->message = $messageFail;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $code)
    {
            if(!preg_match('/^[0-9]{10}$/',$code))
                return false;
            for($i=0;$i<10;$i++)
                if(preg_match('/^'.$i.'{10}$/',$code))
                    return false;
            for($i=0,$sum=0;$i<9;$i++)
                $sum+=((10-$i)*intval(substr($code, $i,1)));
            $ret=$sum%11;
            $parity=intval(substr($code, 9,1));
            if(($ret<2 && $ret==$parity) || ($ret>=2 && $ret==11-$parity))
                return true;
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
