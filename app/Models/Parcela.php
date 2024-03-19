<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcela extends Model
{
    protected $table = 'parcela';

    protected $fillable = [
        'venda',
        'numero_parcela',
        'data_vencimento',
        'valor',
        'status',
    ];

    public function venda()
    {
        return $this->belongsTo(Venda::class, 'venda');
    }

    use HasFactory;
}
