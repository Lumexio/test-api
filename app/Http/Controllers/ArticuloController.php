<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use App\Models\Articulo;
use App\Events\articuloCreated;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dat = DB::table('articulos_tbl')
            ->leftJoin('categorias_tbl', 'articulos_tbl.categoria_id', '=', 'categorias_tbl.id')
            ->leftJoin('marcas_tbl', 'articulos_tbl.marca_id', '=', 'marcas_tbl.id')
            ->leftJoin('proveedores_tbl', 'articulos_tbl.proveedor_id', '=', 'proveedores_tbl.id')
            ->leftJoin('status_tbl', 'articulos_tbl.status_id', '=', 'status_tbl.id')
            ->leftJoin('tipos_tbl', 'articulos_tbl.tipo_id', '=', 'tipos_tbl.id')
            ->leftJoin('rack_tbl', 'articulos_tbl.rack_id', '=', 'rack_tbl.id')
            ->leftJoin('travesano_tbl', 'articulos_tbl.travesano_id', '=', 'travesano_tbl.id')
            ->select('articulos_tbl.id', 'articulos_tbl.nombre_articulo', 'articulos_tbl.cantidad_articulo', 'articulos_tbl.descripcion_articulo', 'categorias_tbl.nombre_categoria', 'marcas_tbl.nombre_marca', 'proveedores_tbl.nombre_proveedor', 'status_tbl.nombre_status', 'tipos_tbl.name_tipo', 'travesano_tbl.nombre_travesano', 'rack_tbl.nombre_rack')->get();
        return $dat;


        //return Articulo::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articulo = Articulo::create($request->all());
        articuloCreated::dispatch($articulo);
        return $articulo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Articulo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $articulo = Articulo::find($id);

        $articulo->update($request->all());

        return $articulo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articulo = Articulo::destroy($id);
        return $articulo;
    }
}
