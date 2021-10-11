<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $fillable=['email_type','email_id','value'];
    protected $table='emails';

    public function emailable()
    {
        return $this->morphTo('email');
    }
}
