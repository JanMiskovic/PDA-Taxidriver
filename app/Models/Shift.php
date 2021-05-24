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

    public function Drive(): hasMany
    {
        return $this->hasMany(Drive::class);
    }

    public function Driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function Taxi(): BelongsTo
    {
        return $this->belongsTo(Taxi::class);
    }
}
