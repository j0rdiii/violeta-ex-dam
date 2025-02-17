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
        Schema::create('dams', function (Blueprint $table) {
            $table->id();

            // 1er Año
            $table->boolean('sistemas_informaticos_active')->default(true);
            $table->decimal('sistemas_informaticos_grade', 5, 2)->default(0.00);
            $table->boolean('bases_datos_active')->default(true); 
            $table->decimal('bases_datos_grade', 5, 2)->default(0.00); 
            $table->boolean('programacion_active')->default(true);
            $table->char('programacion_code', 3)->nullable();
            $table->dateTime('lenguajes_marcas_last_class')->nullable();
            $table->decimal('lenguajes_marcas_grade', 5, 2)->default(0.00);
            $table->boolean('entornos_desarrollo_active')->default(true);
            $table->string('entornos_desarrollo_teacher', 255)->nullable();
            $table->integer('fol_student_count');

            // 2do Año
            $table->boolean('desarrollo_interfaces_active')->default(true); 
            $table->enum('desarrollo_interfaces_status', ['pending', 'completed', 'in_progress'])->default('pending');
            $table->boolean('programacion_multimedia_active')->default(true); 
            $table->decimal('programacion_multimedia_grade', 5, 2)->default(0.00); 
            $table->boolean('acceso_datos_active')->default(true); 
            $table->dateTime('acceso_datos_last_class')->nullable(); 
            $table->integer('servicios_procesos_student_count')->nullable()->change();
            $table->boolean('sistemas_gestion_active')->default(true); 
            $table->char('sistemas_gestion_code', 3)->nullable(); 
            $table->boolean('empresa_iniciativa_active')->default(true);
            $table->string('empresa_iniciativa_teacher', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dam');
    }
};
