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
        Schema::create('ven_pedido_pro', function (Blueprint $table) {
            $table->id('PP_Id');
            $table->unsignedBigInteger('PP_Pedido');
            $table->unsignedBigInteger('PP_Producto');
            $table->integer('PP_Cantidad');
            $table->decimal('PP_Precio', 8, 2);
            $table->timestamp('PP_Alta');
            $table->foreign('PP_Pedido')->references('PE_Id')->on('ven_pedido_info');         
            $table->foreign('PP_Producto')->references('PR_Id')->on('pro_producto_info');         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ven_pedido_pro');
    }
};
