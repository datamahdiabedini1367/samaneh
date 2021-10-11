<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $fillable=['title'];
    protected $table='individuals';

    public function RelatedIndividual()
    {
        return $this->hasOne(PersonRelated::class,'individual_id','id');
    }
}
