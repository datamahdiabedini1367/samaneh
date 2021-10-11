<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use const http\Client\Curl\PROXY_HTTP;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $perPage=5;


    protected $fillable = [
        'role_id',
        'username',
        'is_active',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table='users';

    public function projects(){
        return $this->belongsToMany(Project::class,'project_user')
                    ->withPivot(['deleted_at'])
                    ->withTimestamps();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function getActiveAttribute()
    {
        return $this->is_active ? 'فعال' : 'غیر فعال';
    }


}
