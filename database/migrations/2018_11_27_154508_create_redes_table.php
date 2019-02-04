<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('link')->nullable();
            $table->string('resumen')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('icono')->nullable();
            $table->string('imagen')->nullable();
            $table->string('slug')->unique();
            $table->integer('orden')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('redes');
    }
}
