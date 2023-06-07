<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('saida_equipamentos', function (Blueprint $table) {
            $table->id();
            $table->date('data_pedido');
            $table->unsignedBigInteger('equipamento_id');
            $table->foreign('equipamento_id')->references('id')->on('equipamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
