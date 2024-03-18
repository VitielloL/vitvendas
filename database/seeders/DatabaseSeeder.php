<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(popula_users::class);
        $this->call(popula_cliente::class);
        $this->call(popula_produto::class);
        $this->call(popula_venda::class);
        $this->call(popula_itens_venda::class);
        $this->call(popula_parcela::class);
    }
}
