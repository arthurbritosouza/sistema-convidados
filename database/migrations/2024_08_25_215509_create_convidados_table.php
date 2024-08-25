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
        Schema::create('convidados', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('nome')->nullable();
            $table->text('sobrenome')->nullable();
            $table->integer('idade')->nullable();
            $table->integer('reserva')->nullable();
            $table->integer('presenca')->nullable()->comment('1-presente 2-ausente');
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convidados');
    }
};
