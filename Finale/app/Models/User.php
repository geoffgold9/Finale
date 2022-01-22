<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  // public function setPasswordAttribute($password) 
   //{
     //  $this->attributes['password'] = Has::make($password);
   //}
    public function roles()
    {
        return $this->belongsToMany(related:'App\Models\Role');
    }
    /**
     * Check if the user has a role
     * @param array   $role
     * @return bool
     */
    public function hasAnyRole( string $role)
    {
        return null !==$this->roles()->where('name', $role)->first();
    }

    /**
 * @return bool
 */

   
}
