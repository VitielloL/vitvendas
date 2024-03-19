<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
        'titulo',
        'valor',
        'descricao',
    ];

    public function itensVenda()
    {
        return $this->hasMany(Itens_Venda::class, 'produto');
    }

    use HasFactory;
}
