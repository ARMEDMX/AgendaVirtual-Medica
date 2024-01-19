<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Medicamentos;
use App\Models\Medicos;
use App\Models\Pacientes;
use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtcita;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }
        
        $cita = Citas::all();
        $recetas = Receta::where('cita', 'like', $p1 . '%')->paginate(5);

        return view('recetas.index', ['recetas' => $recetas, 'input' => $input, 'cita' => $cita]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $receta = new Receta;
        $medicamentos = Medicamentos::get();
        $citaid = request()->input('cita_id');
        

        return view('recetas.formulario', ['receta' => $receta, 'medicamentos' => $medicamentos, 'cita' => $citaid]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $citaid = request()->input('citas_id');

        $cita = Citas::find($citaid);
        $recetaValidada = request()->validate([
            'medicamentos_id' => 'required',
            'citas_id' => 'required',
            'dosis' => 'required',
            'frecuencia' => 'required',
            'duracion' => 'required',
            'viaadmin' => 'required',
        ]);

       

        Receta::create($recetaValidada);
        return redirect()->action([CitasController::class, 'show'],['cita' => $cita->id])->with('mensaje', 'La receta se INSERTO correctamente ');

    }

    /**
     * Display the specified resource.
     */
    public function show($id )
    {

        $cita = Citas::findOrFail($id);
        $recetas = $cita->recetas;
        return view('citas.show', compact('cita','receta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receta $receta)
    {
        $medicamentos = Medicamentos::all();
        $citaid = request()->input('cita_id');

        return view('recetas.formulario', [ 'receta' => $receta, 'medicamentos' => $medicamentos, 'cita' => $citaid]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receta $receta)
    {
        $citaid = request()->input('citas_id');

        $cita = Citas::find($citaid);
        $recetaValidada = request()->validate([
            'medicamentos_id' => 'required',
            'dosis' => 'required',
            'frecuencia' => 'required',
            'duracion' => 'required',
            'viaadmin' => 'required',
        ]);

       

        $receta->update($recetaValidada);
        return redirect()->action([CitasController::class, 'show'],['cita' => $cita->id])->with('mensaje', 'La receta se ACTUALIZO correctamente ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta, Request $request)
    {
        $citaid=$request->input('cita_id');
        $receta->delete();
        return redirect()->action([CitasController::class, 'show'],['cita' => $citaid])->with('mensaje', 'La receta se ELIMINO correctamente ');
    }
}
