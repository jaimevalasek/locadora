<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeiculoLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'montadora',
        'data_inicio',
        'data_fim',
        'veiculo_id',
        'locadora_id',
    ];
}
