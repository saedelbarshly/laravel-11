<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

}