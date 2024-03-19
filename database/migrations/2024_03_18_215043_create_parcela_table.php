<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('parcela', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venda_id')->unsigned();
            $table->decimal('numero_parcela');
            $table->date('data_vencimento');
            $table->decimal('valor');
            $table->string('status');
            $table->timestamps();
            $table->foreign('venda_id')->references('id')->on('venda')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('parcela');
    }
};
