<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travesaño;
use App\events\travesañoCreated;

class TravesañoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Travesaño::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $travesaño = Travesaño::create($request->all());
        travesañoCreated::dispatch($travesaño);
        return $travesaño;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Travesaño::find($id);
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
        $travesaño = Travesaño::find($id);
        $travesaño->update($request->all());
        return $travesaño;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Travesaño::destroy($id);
    }
}
