<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class popula_itens_venda extends Seeder
{
    public function run(): void
    {
        DB::table('itens_venda')->insert([
            'venda_id' => '1',
            'produto_id' => '1',
            'quantidade' => '10',
            'preco_unitario' => '10',
            'subtotal' => '100',
        ]);
    }
}
