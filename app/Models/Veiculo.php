<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_portas',
        'cor',
        'fabricante',
        'ano_modelo',
        'ano_fabricacao',
        'placa',
        'chassi',
        'modelo_id',
    ];

    public function modelo(): HasOne
    {
        return $this->hasOne(Modelo::class, 'id', 'modelo_id');
    }

    public function locadora(): BelongsToMany
    {
        return $this->belongsToMany(Locadora::class, 'locadora_veiculos');
    }
}
