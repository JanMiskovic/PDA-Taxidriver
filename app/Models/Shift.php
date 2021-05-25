<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'start',
        'end',
        'id_driver',
        'id_taxi',
    ];

    public function drive(): hasMany
    {
        return $this->hasMany(Drive::class);
    }

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class, 'id_driver');
    }

    public function taxi(): BelongsTo
    {
        return $this->belongsTo(Taxi::class, 'id_taxi');
    }
}
