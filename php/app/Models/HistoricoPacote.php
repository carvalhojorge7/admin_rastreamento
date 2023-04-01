<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoPacote extends Model
{
    use HasFactory;

    protected $fillable = [
        'pacote_id',
        'data_atualizado_em',
        'hora_atualizado_em',
        'status',
        'detalhes'
    ];
}
