<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coordenada extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitud',
        'longitud',
    ];

    public function delito(): HasMany
    {
        return $this->hasMany(Delito::class);
    }
}
