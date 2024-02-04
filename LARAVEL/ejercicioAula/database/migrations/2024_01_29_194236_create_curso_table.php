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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 75);
            $table->string('nivel', 35);
            $table->string('horasAcademicas', 35)->nullable();
            $table->unsignedBigInteger('profesor_id')->nullable();

            // onDelete cascade: si se elimina un profesor, se eliminan todos sus cursos
            // onDelete set null: si se elimina un profesor, se pone a null el campo profesor_id de sus cursos
            // onDelete restrict: si se elimina un profesor, no se eliminan sus cursos
            // onDelete no action: si se elimina un profesor, no se eliminan sus cursos
            // onDelete set default: si se elimina un profesor, se pone a default el campo profesor_id de sus cursos
            $table->foreign('profesor_id')->references('id')->on('profesores')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */ 
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
