<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $fillable=['id_type_account','value','account_type','account_id'];
    protected $table="accounts";

    public function accountType()
    {
        return $this->belongsTo(AccountType::class,'id_type_account');
     }

    public function accountable()
    {
        return $this->morphTo('account');
     }


}
