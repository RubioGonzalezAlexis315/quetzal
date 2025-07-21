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
        Schema::create('pro_calificacion', function (Blueprint $table) {
            $table->id('CF_Id');
            $table->unsignedBigInteger('CF_Cliente');
            $table->unsignedBigInteger('CF_Producto'); 
            $table->tinyInteger('CF_Calificacion');
            $table->timestamp('CF_Alta');
            $table->foreign('CF_Cliente')->references('CL_Id')->on('cli_cliente_info');         
            $table->foreign('CF_Producto')->references('PR_Id')->on('pro_producto_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_calificacion');
    }
};
