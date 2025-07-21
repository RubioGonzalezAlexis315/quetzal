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
        Schema::create('cli_cliente_info', function (Blueprint $table) {
            $table->id('CL_Id'); 
            $table->string('CL_Nombre');
            $table->string('CL_Email')->unique();
            $table->string('CL_Password');
            $table->timestamp('CL_Alta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cli_cliente_info');
    }
};
