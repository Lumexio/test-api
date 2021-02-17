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
            $table->longText('descripcion_articulo')->nullable('NULL');
            $table->foreignId('categoria_id')->nullable('NULL')->references('id')->on('categorias_tbl');
            $table->foreignId('marca_id')->nullable('NULL')->references('id')->on('marcas_tbl');
            $table->foreignId('proveedor_id')->nullable('NULL')->references('id')->on('proveedores_tbl');
            $table->foreignId('ubicacion_id')->nullable('NULL')->references('id')->on('ubicaciones_tbl');
            $table->foreignId('status_id')->nullable('NULL')->references('id')->on('status_tbl');
            $table->foreignId('tipo_id')->nullable('NULL')->references('id')->on('tipos_tbl');
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
