<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dia_semanas_id');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->unsignedBigInteger('grupo_academicos_id');
            $table->unsignedBigInteger('cursos_id');
            $table->unsignedBigInteger('users_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();

            $table->foreign('dia_semanas_id')
                ->references('id')
                ->on('dia_semanas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('grupo_academicos_id')
                ->references('id')
                ->on('grupo_academicos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('cursos_id')
                ->references('id')
                ->on('cursos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('users_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('horarios');
    }
}
