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
    {
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 50);
            $table->string('descricao', 150);
            $table->string('uni_unitaria', 10);
            $table->decimal('quantidade', $precison = 8, $scale = 2);
            $table->decimal('valor', $precison = 8, $scale = 2);
            $table->timestamps();
        });
    }
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
