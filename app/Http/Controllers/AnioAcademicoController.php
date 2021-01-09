<?php

namespace App\Http\Controllers;

use App\Models\Anio_academico;
use Illuminate\Http\Request;

class AnioAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = route('anio_academico.guardar');
        $anio = new Anio_academico();
        $anios = Anio_academico::all();
        return view('anio_academico.crear')->with(compact('action', 'anio', 'anios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anio = new Anio_academico($request->input());
        $anio->save();
        return redirect()->route('anio_academico.crear');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anio_academico  $anio_academico
     * @return \Illuminate\Http\Response
     */
    public function show(Anio_academico $anio_academico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anio_academico  $anio_academico
     * @return \Illuminate\Http\Response
     */
    public function edit(Anio_academico $anio_academico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anio_academico  $anio_academico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anio_academico $anio_academico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anio_academico  $anio_academico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anio_academico $anio_academico)
    {
        //
    }
}
