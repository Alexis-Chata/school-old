<?php

namespace App\Http\Controllers;

use App\Models\Evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
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
        $action = route('evaluacion.store');
        $evaluacion = new Evaluacion();
        $evaluacions = Evaluacion::all();
        return view('evaluacion.crear')->with(compact('action', 'evaluacion', 'evaluacions'));
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
            $evaluacion = new Evaluacion($request->input());
            $evaluacion->name = strtolower($request->input('name'));
            $evaluacion->save();
            return redirect()->route('evaluacion.create')->with('info','La evaluacion se creo con exito');
        }
        return redirect()->route('evaluacion.create');
    }
    #reglas de validacion
    private function _rules()
    {
        $messages = [
            'name.required' => 'La evaluacion es requerido',
        ];

        $rules = [
            'name' => 'required',
        ];

        return array($rules, $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluacion $evaluacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluacion $evaluacion)
    {
        $btn_name = 'Actualizar';
        $put = True;
        $action = route('evaluacion.update', $evaluacion);

        return view('evaluacion.actualizar')->with(compact('evaluacion', 'action', 'put', 'btn_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluacion $evaluacion)
    {
        $request->validate([
            'name' => "required|unique:evaluacions,name,$evaluacion->id",
        ]);

        if ($request->input('name')) {
            $evaluacion->name = $request->input('name');
            $evaluacion->save();

            return redirect()->route('evaluacion.create')->with('info','La evaluacion se actualizo con exito');
        }
        return redirect()->route('evaluacion.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluacion $evaluacion)
    {
        $evaluacion->delete();
        return redirect()->route('evaluacion.create')->with('info','La evaluacion se elimino con exito');
    }
}
