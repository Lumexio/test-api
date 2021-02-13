<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos_tbl', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_articulo');
            $table->integer('cantidad_articulo');
            $table->longText('descripcion_articulo');
            $table->foreignId('categoria_id')->references('id')->on('categorias_tbl');
            $table->foreignId('marca_id')->references('id')->on('marcas_tbl');
            $table->foreignId('proveedor_id')->references('id')->on('proveedores_tbl');
            $table->foreignId('ubicacion_id')->references('id')->on('ubicaciones_tbl');
            $table->foreignId('status_id')->references('id')->on('status_tbl');
            $table->foreignId('tipo_id')->references('id')->on('tipos_tbl');
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_tbl');
    }
}
