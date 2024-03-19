<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class popula_venda extends Seeder
{
    public function run(): void
    {
        DB::table('venda')->insert([
            'cliente_id' => '1',
            'forma_de_pagamento' => 'dinheiro',
            'data_venda' => '2024-03-12',
            'total_venda' => '100',
        ]);
    }
}
