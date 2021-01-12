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
        $btn_name = 'Registrar';
        $action = route('anio_academico.store');
        $anio_academico = new Anio_academico();
        $anios = Anio_academico::all();
        return view('anio_academico.crear')->with(compact('action', 'anio_academico', 'anios', 'btn_name'));
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
            return redirect()->route('anio_academico.create')->with('info','El año academico se creo con exito');
        }
        return redirect()->route('anio_academico.create');
    }
    #reglas de validacion
    private function _rules()
    {
        $messages = [
            'name.required' => 'El año academico es requerido',
            'name.min' => 'minimo 4 digitos',
        ];

        $rules = [
            'name' => 'required|min:4|unique:anio_academicos,name,except,id',
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
        $btn_name = 'Actualizar';
        $put = True;
        $action = route('anio_academico.update', $anio_academico);

        return view('anio_academico.actualizar')->with(compact('anio_academico', 'action', 'put', 'btn_name'));
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
        // list($rules, $messages) = $this->_rules();
        // $this->validate($request, $rules, $messages);

        $request->validate([
            'name' => "required|min:4|unique:anio_academicos,name,$anio_academico->id",
        ]);

        if ($request->input('name')) {
            $anio_academico->name = $request->input('name');
            $anio_academico->save();

            return redirect()->route('anio_academico.create')->with('info','El año academico se actualizo con exito');
        }
        return redirect()->route('anio_academico.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anio_academico  $anio_academico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anio_academico $anio_academico)
    {
        $anio_academico->delete();
        return redirect()->route('anio_academico.create')->with('info','El año academico se elimino con exito');
    }
}
