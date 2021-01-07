<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matriculas_id');
            $table->unsignedBigInteger('cursos_id');
            $table->unsignedBigInteger('evaluacions_id');
            $table->integer('valor');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();

            $table->foreign('matriculas_id')
                ->references('id')
                ->on('matriculas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('cursos_id')
                ->references('id')
                ->on('cursos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('evaluacions_id')
                ->references('id')
                ->on('evaluacions')
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
        Schema::dropIfExists('notas');
    }
}
