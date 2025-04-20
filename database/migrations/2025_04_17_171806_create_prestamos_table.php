<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('prestamos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuario que presta
        $table->foreignId('libro_id')->constrained()->onDelete('cascade'); // Libro prestado
        $table->foreignId('user_recibe_id')->constrained('users')->onDelete('cascade'); // Usuario que recibe el libro
        $table->date('fecha_prestamo');
        $table->date('fecha_devolucion')->nullable();
        $table->boolean('devuelto')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
