<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $fillable=['phone_type','phone_id','value'];
    protected $table='phones';

    public function phoneable()
    {
        return $this->morphTo('phone');
    }
}
