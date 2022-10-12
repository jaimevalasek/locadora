<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
