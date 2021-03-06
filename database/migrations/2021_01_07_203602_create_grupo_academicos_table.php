<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_academicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anio_academicos_id');
            $table->unsignedBigInteger('grados_id');
            $table->unsignedBigInteger('seccions_id');
            $table->string('name');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();

            $table->foreign('anio_academicos_id')
                ->references('id')
                ->on('anio_academicos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('grados_id')
                ->references('id')
                ->on('grados')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('seccions_id')
                ->references('id')
                ->on('seccions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_academicos');
    }
}
