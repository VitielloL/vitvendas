<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = 'venda';

    protected $fillable = [
        'cliente',
        'forma_de_pagamento',
        'data_venda',
        'total_venda',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente');
    }

    public function itens()
    {
        return $this->hasMany(Itens_Venda::class, 'venda');
    }

    public function parcelas()
    {
        return $this->hasMany(Parcela::class, 'venda');
    }

    use HasFactory;
}
