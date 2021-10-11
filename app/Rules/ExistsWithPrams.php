<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ExistsWithPrams implements Rule
{
    protected $table;
    protected $columns;
    protected $values;
    protected $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table,$columns,$values,$messageFail)
    {
        $this->table=$table;
        $this->columns=$columns;
        $this->values=$values;
        $this->message = $messageFail;
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
        return DB::table($this->table)->where($this->columns,$this->values)->exists();
//        return !( DB::table($this->table)->where('id','!=',$this->id)->where($this->column,$value)->exists() );
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
