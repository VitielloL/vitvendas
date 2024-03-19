<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens_Venda extends Model
{
    protected $table = 'itens_venda';

    protected $fillable = [
        'venda',
        'produto',
        'quantidade',
        'preco_unitario',
        'subtotal',
    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'venda');
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto');
    }

    use HasFactory;
}
