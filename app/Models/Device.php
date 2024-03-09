<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        "name", "city", "latitude", "longitude"
    ];

    public function slots(): HasMany {
        return $this->hasMany(Slot::class);
    }

    public function tokens(): HasMany {
        return $this->hasMany(DeviceToken::class);
    }

    public function reports(): HasMany {
        return $this->hasMany(DeviceReport::class);
    }

    public function scopeCoordinates($builder): void {
        $builder->whereNotNull("latitude")->whereNotNull("longitude");
    }

    public function scopePopular(Builder $query)
    {
        return $query->withCount('transactions');
    }
    public function scopePopularDevice(Builder $query) : Builder
    {
        return $query->
    }

}
