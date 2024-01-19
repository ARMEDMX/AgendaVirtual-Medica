<?php

namespace App\Http\Controllers;

use App\Models\Medicamentos;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtnombre;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $medicamentos = Medicamentos::where('nombre', 'like', $p1 . '%')->paginate(10);
        return view('medicamentos.index', ['medicamentos' => $medicamentos, 'input' => $input]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicamento = new Medicamentos;

        return view('medicamentos.formulario',['medicamento' => $medicamento]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $medicamentoValidado = request()->validate([
            'nombre'=>'required', 
            'tipo_medicamento'=>'required', 
            'fecha_caducidad'=>'required']);
        
       

        Medicamentos::create($medicamentoValidado);
        return redirect()->route('medicamento.index')->with('mensaje', 'El medicamento se INSERTO correctamente ');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamentos $medicamento)
    {
        return view('medicamentos.show', ['medicamento'=>$medicamento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamentos $medicamento)
    {
        return view('medicamentos.formulario',['medicamento'=>$medicamento]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamentos $medicamento)
    {
        $medicamentoValidado = request()->validate([
            'nombre'=>'required', 
            'tipo_medicamento'=>'required', 
            'fecha_caducidad'=>'required']);
            
    
        $medicamento->update($medicamentoValidado);
        return redirect()->route('medicamento.index')->with('mensaje', 'El medicamento se ACTUALIZO correctamente ');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamentos $medicamento)
    {
        $medicamento->delete();
        return redirect()->route('medicamento.index');
    }
}
