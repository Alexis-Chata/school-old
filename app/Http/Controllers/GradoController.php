<?php

namespace App\Http\Controllers;

use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
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
        $action = route('grado.store');
        $grado = new Grado();
        $grados = Grado::all();
        return view('grado.crear')->with(compact('action', 'grado', 'grados', 'btn_name'));
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
            $grado = new Grado($request->input());
            $grado->name = strtolower($request->input('name'));
            $grado->save();
            return redirect()->route('grado.create')->with('info','El grado se creo con exito');
        }
        return redirect()->route('grado.create');
    }
    #reglas de validacion
    private function _rules()
    {
        $messages = [
            'name.required' => 'El grado es requerido',
        ];

        $rules = [
            'name' => 'required|min:4|unique:grados,name,except,id',
        ];

        return array($rules, $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function show(Grado $grado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function edit(Grado $grado)
    {
        $btn_name = 'Actualizar';
        $put = True;
        $action = route('grado.update', $grado);

        return view('grado.actualizar')->with(compact('grado', 'action', 'put', 'btn_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grado $grado)
    {
        $request->validate([
            'name' => "required|min:4|unique:grados,name,$grado->id",
        ]);

        if ($request->input('name')) {
            $grado->name = $request->input('name');
            $grado->save();

            return redirect()->route('grado.create')->with('info','El grado se actualizo con exito');
        }
        return redirect()->route('grado.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grado  $grado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grado $grado)
    {
        $grado->delete();
        return redirect()->route('grado.create')->with('info','El grado se elimino con exito');
    }
}
