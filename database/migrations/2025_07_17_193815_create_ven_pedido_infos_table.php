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
        Schema::create('ven_pedido_info', function (Blueprint $table) {
            $table->id('PE_Id');
            $table->string('PE_Estatus')->default('Pendiente');
            $table->unsignedBigInteger('PE_Cliente');
            $table->decimal('PE_Total', 10, 2);
            $table->timestamp('PE_Alta');
            $table->foreign('PE_Cliente')->references('CL_Id')->on('cli_cliente_info');         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ven_pedido_info');
    }
};
