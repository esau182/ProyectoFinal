<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delito extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipoDelito',
        'descripcion',
        'fecha',
        'latitud',
        'longitud',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function coordenada(): BelongsTo
    {
        return $this->belongsTo(Coordenada::class);
    }
}
