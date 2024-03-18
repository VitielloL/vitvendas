<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('venda', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente')->unsigned();
            $table->string('forma_de_pagamento');
            $table->date('data_venda');
            $table->decimal('total_venda');
            $table->timestamps();
            $table->foreign('cliente')->references('id')->on('cliente')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('venda');
    }
};
