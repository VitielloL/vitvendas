<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'venda';

    protected $fillable = [
        'cliente_id',
        'forma_de_pagamento',
        'data_venda',
        'total_venda',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function itens()
    {
        return $this->hasMany(Itens_Venda::class, 'venda_id');
    }

    public function parcelas()
    {
        return $this->hasMany(Parcela::class, 'venda_id');
    }

    use HasFactory;
}
