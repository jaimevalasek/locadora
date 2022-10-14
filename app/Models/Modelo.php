<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'montadora_id'
    ];

    public function montadora()
    {
        return $this->hasOne(Montadora::class, 'id', 'montadora_id');
    }
}
