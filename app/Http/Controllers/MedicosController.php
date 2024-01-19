<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use App\Models\Medicos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medico = Medicos::where('users_id', auth()->user()->id)->first();

        return view('medicos.index', compact('medico'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medico = new Medicos;
        $user = Auth::user();
        $espec = Especialidades::get();

        
        return view('medicos.formulario',['medico' => $medico, 'user' => $user, 'espec' => $espec ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medicoValidado = request()->validate([
            'nombre'=>'required', 
            'apellidop'=>'required',
            'apellidom'=>'required',
            'users_id' => 'required',
            'especialidades_id' => 'required',
        ]);
        
       

        Medicos::create($medicoValidado);
        return redirect()->route('medico.index')->with('mensaje', 'El medico se INSERTO correctamente ');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicos $medico)
    {
        return view('medicos.show', ['medico'=>$medico]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicos $medico)
    {
        $user = Auth::user();
        $espec = Especialidades::get();


        return view('medicos.formulario',['medico'=>$medico, 'user' => $user, 'espec' => $espec ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicos $medico)
    {
        $medicoValidado = request()->validate([
            'nombre'=>'required', 
            'apellidop'=>'required',
            'apellidom'=>'required',
            'especialidades_id' => 'required',
        
        ]);
    
        $medico->update($medicoValidado);
        return redirect()->route('medico.index')->with('mensaje', 'El medico se ACTUALIZO correctamente ');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicos $medico)
    {
        $medico->delete();
        return redirect()->route('medico.index');
    }
}
