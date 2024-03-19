<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class popula_parcela extends Seeder
{
    public function run(): void
    {
        DB::table('parcela')->insert([
            'venda_id' => '1',
            'numero_parcela' => '10',
            'data_vencimento' => '2024-03-12',
            'valor' => '10',
            'status' => 'aberto',
        ]);
    }
}
