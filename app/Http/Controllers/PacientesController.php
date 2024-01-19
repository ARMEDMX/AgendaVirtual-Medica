<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $paciente = Pacientes::where('users_id', auth()->user()->id)->first();

        return view('pacientes.index', compact('paciente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $paciente = new Pacientes;
        $user = Auth::user();

        return view('pacientes.formulario',['paciente' => $paciente, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pacienteValidado = request()->validate([
            'nombre'=>'required', 
            'apellidop'=>'required',
            'apellidom'=>'required',
            'genero'=>'required',
            'fechanac'=>'required',
            'email'=>'required',
            'users_id' => 'required'
        ]);
        
       

        Pacientes::create($pacienteValidado);
        return redirect()->route('paciente.index')->with('mensaje', 'El paciente se INSERTO correctamente ');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Pacientes $paciente)
    {

        return view('pacientes.perfil', ['paciente'=>$paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pacientes $paciente)
    {
        $user = Auth::user();
        return view('pacientes.perfil',['paciente'=>$paciente, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pacientes $paciente)
    {
        $pacienteValidado = request()->validate([
            'nombre'=>'required', 
            'apellidop'=>'required',
            'apellidom'=>'required',
            'genero'=>'required',
            'fechanac'=>'required',
            'email'=>'required',
        
        ]);
    
        $paciente->update($pacienteValidado);
        return redirect()->route('paciente.index')->with('mensaje', 'El paciente se ACTUALIZO correctamente ');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pacientes $paciente)
    {
        $paciente->delete();
        return redirect()->route('paciente.index');
    }
}
