<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'access_token',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin(): bool
    {
        return (bool) $this->getAttribute('is_admin');
    }

    public static function userWithEmailExists(string $email): bool
    {
        return static::query()->where('email', '=', $email)->exists();
    }

    public static function accessTokenMatches(string $accessToken): bool
    {
        return static::query()->where('access_token', '=', $accessToken)->exists();
    }

    /**
     * @param string $accessToken
     *
     * @return User|Model
     */
    public static function getByAccessToken(string $accessToken): ?User
    {
        return static::query()->where('access_token', '=', $accessToken)->first();
    }
}
