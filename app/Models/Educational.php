<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educational extends Model
{
    use HasFactory;
    protected $table='educational_backgrounds';
    protected $guarded=['id'];
    protected $fillable=[
         'person_id', 'grade', 'major', 'universityName',
         'address', 'average','startDate','endDate'
    ];

    public function getStartDateEducationalAttribute()
    {
        return convert_date($this->startDate, 'jalali');
    }

    public function getEndDateEducationalAttribute()
    {
        return convert_date($this->endDate, 'jalali');
    }

    public function person()
    {
        return $this->belongsTo(Person::class,'person_id','id');
    }



}
