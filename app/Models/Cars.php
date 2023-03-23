<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'model',
        'year',
        'color',
        'rental_price_per_day',
        'is_available',
    ];

    public function rentals(): HasMany
    {
        return $this->hasMany(Rental::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true);
    }

    public function isAvailable(): bool
    {
        return $this->is_available;
    }

    public function rent(User $user, Rental $rental): bool
    {
        if ($this->isAvailable()) {
            $this->is_available = false;
            $this->rentals()->save($rental);
            $user->rentals()->save($rental);
            return true;
        }
        return false;
    }

    public function return(): bool
    {
        if (!$this->isAvailable()) {
            $this->is_available = true;
            $this->rentals->last()->update(['rental_end_date' => now()]);
            return true;
        }
        return false;
    }

}
