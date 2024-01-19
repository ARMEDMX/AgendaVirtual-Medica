<?php

namespace App\Http\Controllers;

use App\Models\Especialidades;
use Illuminate\Http\Request;

class EspecialidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtespecialidad;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $especialidades = Especialidades::where('especialidad', 'like', $p1 . '%')->paginate(5);
        return view('especialidades.index', ['especialidades' => $especialidades, 'input' => $input]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $espec = new Especialidades;

        return view('especialidades.formulario',['espec' => $espec]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $especValidado = request()->validate([
            'especialidad' => 'required|unique:especialidades', 
        ]);
        
       

        Especialidades::create($especValidado);
        return redirect()->route('espec.index')->with('mensaje', 'La especialidad se INSERTO correctamente ');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Especialidades $espec)
    {
        return view('especialidades.show', ['espec'=>$espec]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Especialidades $espec)
    {
        return view('especialidades.formulario',['espec'=>$espec]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Especialidades $espec)
    {
        $especValidado = request()->validate([
            'especialidad' => 'required|unique:especialidades,especialidad,' . $espec->id,
        ]);
            
    
        $espec->update($especValidado);
        return redirect()->route('espec.index')->with('mensaje', 'La especialidad se ACTUALIZO correctamente ');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Especialidades $espec)
    {
        $espec->delete();
        return redirect()->route('espec.index');
    }
}
