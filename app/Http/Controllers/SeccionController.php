<?php

namespace App\Http\Controllers;

use App\Models\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
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
        $action = route('seccion.store');
        $seccion = new Seccion();
        $seccions = Seccion::all();
        return view('seccion.crear')->with(compact('action', 'seccion', 'seccions'));
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
            $seccion = new Seccion($request->input());
            $seccion->name = strtoupper($request->input('name'));
            $seccion->save();
            return redirect()->route('seccion.create')->with('info','La seccion se creo con exito');
        }
        return redirect()->route('seccion.create');
    }
    #reglas de validacion
    private function _rules()
    {
        $messages = [
            'name.required' => 'La seccion es requerida',
        ];

        $rules = [
            'name' => 'required|unique:seccions,name,except,id',
        ];

        return array($rules, $messages);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show(Seccion $seccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccion)
    {
        $btn_name = 'Actualizar';
        $put = True;
        $action = route('seccion.update', $seccion);

        return view('seccion.actualizar')->with(compact('seccion', 'action', 'put', 'btn_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seccion $seccion)
    {
        $request->validate([
            'name' => "required|unique:seccions,name,$seccion->id",
        ]);

        if ($request->input('name')) {
            $seccion->name = $request->input('name');
            $seccion->save();

            return redirect()->route('seccion.create')->with('info','La seccion se actualizo con exito');
        }
        return redirect()->route('seccion.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $seccion)
    {
        $seccion->delete();
        return redirect()->route('seccion.create')->with('info','La seccion se elimino con exito');
    }
}
