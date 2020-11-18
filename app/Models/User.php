<?php

namespace App\Models;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
class User extends \Illuminate\Foundation\Auth\User implements JWTSubject
{
    use HasFactory;
    protected $fillable=[
        'Email',
        'Username',
        'Password',


    ];
    public function getJWTIdentifier()
{
    return $this->getKey();
}

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getAuthPassword() {
        return $this->Password;
    }
}
