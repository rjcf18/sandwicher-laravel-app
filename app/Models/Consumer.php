<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'access_code'
    ];

    public static function consumerWithEmailExists(string $email): bool
    {
        return (bool) static::query()->where('email', '=', $email)->exists();
    }
}
