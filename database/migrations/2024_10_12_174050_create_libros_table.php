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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('isbn', 50);
            $table->string('nombre', 100);
            $table->foreignId('genero_id')->constrained('generos')->onUpdate('cascade')->onDelete('restrict');
            $table->text('sinopsis');
            $table->integer('paginas');
            $table->date('fecha_publicacion');
            $table->string('image',80);

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
