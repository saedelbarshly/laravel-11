<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Region extends Model
{
    use HasFactory;


    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function districts(): HasManyThrough
    {
        return $this->hasManyThrough(District::class, City::class);
    }
}
