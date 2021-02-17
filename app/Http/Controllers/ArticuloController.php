<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Http\Response;
use App\Models\Articulo;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Articulo::all();
        return DB::table('articulos_tbl')
            ->join('categorias_tbl', 'articulos_tbl.categoria_id', '=', 'categorias_tbl.id')
            ->join('marcas_tbl', 'articulos_tbl.marca_id', '=', 'marcas_tbl.id')
            ->join('proveedores_tbl', 'articulos_tbl.proveedor_id', '=', 'proveedores_tbl.id')
            ->join('ubicaciones_tbl', 'articulos_tbl.ubicacion_id', '=', 'ubicaciones_tbl.id')
            ->join('status_tbl', 'articulos_tbl.status_id', '=', 'status_tbl.id')
            ->join('tipos_tbl', 'articulos_tbl.tipo_id', '=', 'tipos_tbl.id')
            ->select('articulos_tbl.nombre_articulo', 'articulos_tbl.cantidad_articulo', 'articulos_tbl.descripcion_articulo', 'marcas_tbl.nombre_marca', 'proveedores_tbl.nombre_proveedor', 'ubicaciones_tbl.rack', 'ubicaciones_tbl.traveseaño', 'status_tbl.nombre_status', 'tipos_tbl.name_tipo')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Articulo::create($request->all());
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
        return Articulo::destroy($id);
    }
}
