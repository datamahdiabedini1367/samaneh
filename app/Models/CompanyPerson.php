<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPerson extends Model
{
    use HasFactory;
    protected $perPage=5;

    protected $guarded = ['id'];
    protected $fillable = [
        'person_id', 'company_id', 'reasonLeavingJob', 'startDate', 'endDate', 'semat', 'section', 'created_at', 'updated_at', 'deleted_at'
    ];
    protected $table = 'company_person';
}
