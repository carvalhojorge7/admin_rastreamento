<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacotes extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido',
        'cliente',
        'destino',
        'cep',
        'status',
        'previsao',
        'detalhes'
    ];

    public function historico()
    {
        return $this->hasMany(HistoricoPacote::class, 'pacote_id', 'id');
    }
}
