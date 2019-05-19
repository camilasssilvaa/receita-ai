<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Medico;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::all();

        return view('medico.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medico.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();
        $password = $request->input('password', '');

        $formData = $request->all();
        
        $medico = Medico::create($formData);
        // $medico->nome = $request->input('nome', '');
        // $medico->cpf = $request->input('cpf', '');
        // $medico->crm = $request->input('crm', '');
        // $medico->password = Hash::make($password);
        // $medico->save();

        return redirect()->route('medico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Medico  $medico
     * @return \App\Models\Medico
     */
    public function edit(Medico $medico)
    {
        return view('medico.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        $medico->fill($request->all());
        $medico->save();

        return redirect()->route('medico.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return App\Models\Medico
     */
    public function destroy(Medico $medico)
    {
        // return $medico;
        $medico->delete();
        return redirect()->route('medico.index');
    }
}
