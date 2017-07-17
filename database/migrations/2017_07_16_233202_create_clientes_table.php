<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function(Blueprint $table){
            $table->increments('id');
            $table->string('nombre');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('descuento');
            $table->timestamps();
        });

        //Tabla pivote

        Schema::create('canastillas_clientes', function(Blueprint $table){
            $table->integer('cantidad_prestadas');
            $table->integer('canastillas_id')->unsigned();
            $table->foreign('canastillas_id')->references('id')->on('canastillas')->onDelete('cascade');
            $table->integer('clientes_id')->unsigned();
            $table->foreign('clientes_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('canastillas_clientes');
    }
}
