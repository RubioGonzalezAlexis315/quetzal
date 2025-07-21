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
        Schema::create('cli_comentarios', function (Blueprint $table) {
            $table->id('CM_Id');
            $table->unsignedBigInteger('CM_Cliente');
            $table->unsignedBigInteger('CM_Producto'); 
            $table->text('CM_Comentario');
            $table->timestamp('CM_Alta');
            $table->foreign('CM_Cliente')->references('CL_Id')->on('cli_cliente_info');         
            $table->foreign('CM_Producto')->references('PR_Id')->on('pro_producto_info');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cli_comentarios');
    }
};
