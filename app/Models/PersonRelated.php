<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonRelated extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $observables=['person_id','related_id'];
    protected $guarded=[];
    protected $primaryKey=['person_id','related_id'];
    protected $fillable=['person_id','related_id','individual_id','description'];
    protected $table="person_related";

    public function individual()
    {
        return $this->belongsTo(Individual::class,'individual_id');
    }
}
