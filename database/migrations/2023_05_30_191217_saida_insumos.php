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
        Schema::create('saida_insumos', function (Blueprint $table) {
            $table->id();
            $table->date('data_pedido');
            $table->string('desc_ped', 150);
            $table->unsignedBigInteger('insumo_id');
            $table->foreign('insumo_id')->references('id')->on('insumos');
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
