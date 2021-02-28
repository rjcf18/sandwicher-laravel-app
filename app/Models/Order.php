<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function meal()
    {
        return $this->hasOne(Meal::class, 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }

    public function breadType()
    {
        return $this->hasOne(BreadType::class, 'id');
    }

    public function breadSize()
    {
        return $this->hasOne(BreadSize::class, 'id');
    }

    public function taste()
    {
        return $this->hasOne(Taste::class, 'id');
    }

    public function extra()
    {
        return $this->hasOne(Extra::class, 'id');
    }

    public function vegetable()
    {
        return $this->hasOne(Vegetable::class, 'id');
    }

    public function sauce()
    {
        return $this->hasOne(Sauce::class, 'id');
    }

    public static function orderExistsForMealAndUser(int $mealId, int $userId): bool
    {
        return (bool) static::query()
            ->where('meal_id', '=', $mealId)
            ->where('user_id', '=', $userId)
            ->exists();
    }

    /**
     * @param int $mealId
     * @param int $userId
     *
     * @return Model|Order
     */
    public static function getByMealAndUser(int $mealId, int $userId): ?Order
    {
        return static::query()
            ->where('meal_id', '=', $mealId)
            ->where('user_id', '=', $userId)
            ->first();
    }

    public static function getAllByUserId(int $userId): array
    {
        return static::all()->where('user_id', '=', $userId)->all();
    }
}
