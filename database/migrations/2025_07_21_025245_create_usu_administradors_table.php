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
        Schema::create('usu_administrador', function (Blueprint $table) {
            $table->id('AD_Id');
            $table->string('AD_Nombre');
            $table->string('AD_Correo')->unique();
            $table->string('AD_Contraseña');
            $table->timestamp('AD_Alta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usu_administrador');
    }
};
