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
            Schema::create('usuario', function (Blueprint $table) {
                $table->id();
                $table->string('nome', 50);
                $table->string('email', 150);
                $table->string('setor', 50);
                $table->unsignedBigInteger('setor_id');
                $table->foreign('setor_id')->references('id')->on('setor');
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
