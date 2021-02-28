<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    public function isOpen(): bool
    {
        return (bool) $this->getAttribute('status');
    }

    public static function openMealExists(): bool
    {
        return (bool) static::query()->where('status', '=', 1)->exists();
    }

    /**
     * @return Meal|Model
     */
    public static function getOpenMeal(): ?Meal
    {
        return static::query()->where('status', '=', 1)->first();
    }

    /**
     * @param string $mealRegistrationCode
     *
     * @return Meal|Model
     */
    public static function getMealByRegistrationCode(string $mealRegistrationCode): ?Meal
    {
        return static::query()->where('registration_code', '=', $mealRegistrationCode)->first();
    }
}
