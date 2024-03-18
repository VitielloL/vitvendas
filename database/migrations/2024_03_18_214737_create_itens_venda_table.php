<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itens_venda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venda')->unsigned();
            $table->integer('produto')->unsigned();
            $table->decimal('quantidade');
            $table->decimal('preco_unitario');
            $table->decimal('subtotal');
            $table->timestamps();
            $table->foreign('venda')->references('id')->on('venda')->onDelete('cascade');
            $table->foreign('produto')->references('id')->on('produto')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itens_venda');
    }
};
