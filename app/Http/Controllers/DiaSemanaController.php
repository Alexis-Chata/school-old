<?php

namespace App\Http\Controllers;

use App\Models\Dia_semana;
use Illuminate\Http\Request;

class DiaSemanaController extends Controller
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
        $action = route('dia_semana.store');
        $dia_semana = new Dia_semana();
        $dia_semanas = Dia_semana::all();
        return view('dia_semana.create')->with(compact('action', 'dia_semana', 'dia_semanas'));
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
            $dia_semana = new Dia_semana($request->input());
            $dia_semana->name = strtolower($request->input('name'));
            $dia_semana->save();
            return redirect()->route('dia_semana.create');
        }
        return redirect()->route('dia_semana.create')->with('info','El Dia de Semana se creo con exito');
    }
    #reglas de validacion
    private function _rules()
    {
        $messages = [
            'name.required' => 'El dia de semana es requerido',
        ];

        $rules = [
            'name' => 'required|unique:dia_semanas,name,except,id',
        ];

        return array($rules, $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dia_semana  $dia_semana
     * @return \Illuminate\Http\Response
     */
    public function show(Dia_semana $dia_semana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dia_semana  $dia_semana
     * @return \Illuminate\Http\Response
     */
    public function edit(Dia_semana $dia_semana)
    {
        $btn_name = 'Actualizar';
        $put = True;
        $action = route('dia_semana.update', $dia_semana);

        return view('dia_semana.actualizar')->with(compact('dia_semana', 'action', 'put', 'btn_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dia_semana  $dia_semana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dia_semana $dia_semana)
    {
        $request->validate([
            'name' => "required|unique:dia_semanas,name,$dia_semana->id",
        ]);

        if ($request->input('name')) {
            $dia_semana->name = $request->input('name');
            $dia_semana->save();

            return redirect()->route('dia_semana.create')->with('info','El Dia de Semana se actualizo con exito');
        }
        return redirect()->route('dia_semana.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dia_semana  $dia_semana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dia_semana $dia_semana)
    {
        $dia_semana->delete();
        return redirect()->route('dia_semana.create')->with('info','El Dia de Semana se elimino con exito');
    }
}
