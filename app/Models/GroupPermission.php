<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    use HasFactory;
    protected $table='permission_groups';
    protected $guarded='id';
    protected $fillable=['title'];


    public function permissions()
    {
        $this->hasMany(Permission::class,'group_id','id');
    }
}
