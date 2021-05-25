<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Taxi extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'color',
        'kilometers',
        'reg_plate',
    ];

    public function shift(): hasMany
    {
        return $this->hasMany(Shift::class);
    }
}
