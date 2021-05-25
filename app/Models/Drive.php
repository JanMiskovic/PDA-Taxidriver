<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drive extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_shift',
        'start',
        'end',
        'distance',
        'fare',
    ];

    public function shift(): BelongsTo
    {
        return $this->BelongsTo(Shift::class, 'id_shift');
    }
}
