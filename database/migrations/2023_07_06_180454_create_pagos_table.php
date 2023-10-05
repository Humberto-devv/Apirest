<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->unsigned();
            $table->string('concepto');
            $table->string('monto');
            $table->string('pagar');
            $table->string('fecha');
            $table->string('estatus');
            $table->string('frecuencia')->nullable();
            $table->boolean('fijo')->default(false);
            $table->boolean('doble')->default(false);
            
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
