<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class popula_produto extends Seeder
{
    public function run()
    {
        DB::table('produto')->insert([
            'titulo' => 'Lapis',
            'valor' => '3',
            'descricao' => 'Escreve muito bem',
        ]);
    }
}
