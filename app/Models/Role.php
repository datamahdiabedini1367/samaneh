<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $guarded=['id'];
    protected $fillable=['title','description'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_role');
    }


    public function hasPermission(Permission $permission)
    {
//        $permission1 =Permission::query()->where('title',$permission)->first();
        return $this->permissions()
            ->where('title',$permission->title)
             ->exists();
    }

}
