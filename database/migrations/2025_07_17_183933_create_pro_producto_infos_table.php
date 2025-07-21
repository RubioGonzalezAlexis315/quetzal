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
        Schema::create('pro_producto_info', function (Blueprint $table) {
            $table->id('PR_Id');
            $table->string('PR_Nombre');
            $table->text('PR_Descripcion');
            $table->decimal('PR_Precio', 8, 2);
            $table->unsignedBigInteger('PR_Categoria');
            $table->unsignedBigInteger('PR_Vistas')->default(0);
            $table->string('PR_Imagen')->nullable();
            $table->timestamp('PR_Alta');
            $table->foreign('PR_Categoria')->references('CA_Id')->on('pro_categoria');         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pro_producto_info');
    }
};
