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
        list($rules, $messages) = $this->_rules();
        $this->validate($request, $rules, $messages);

        if ($request->input('name')) {
            $anio = new Anio_academico($request->input());
            $anio->save();
            return redirect()->route('anio_academico.crear');
        }
        return redirect()->route('anio_academico.crear');
    }
    #reglas de validacion
    private function _rules()
    {
        $messages = [
            'name.required' => 'El año academico es requerido',
            'name.min' => 'minimo 4 digitos',
        ];

        $rules = [
            'name' => 'required|min:4',
        ];

        return array($rules, $messages);
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
        $anio = Anio_academico::find($anio_academico);
        $put = True;
        $action = route('anio_academico.update', $anio_academico);

        return view('anio_academico.actualizar')->with(compact('anio', 'action', 'put'));
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
        $anio = Anio_academico::find($anio_academico);
        $anio->dni = $request->input('name');
        $anio->save();

        return redirect()->route('anio_academico.crear');
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
