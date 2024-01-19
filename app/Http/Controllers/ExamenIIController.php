<?php

namespace App\Http\Controllers;

use App\Models\ExamenII;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamenIIController extends Controller
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
        
        $examen2 = ExamenII::where('nombre', 'like', $p1 . '%')->paginate(5);
        return view('examen.index', ['examen2' => $examen2, 'input' => $input]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $examen = new ExamenII;
        return view('examen.formulario',['examen' => $examen]);
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $examenValidado = request()->validate([
            'nombre'=>'required', 
            'foto' => 'required|mimes: jpg,png,svg,jpeg']);

        $examen = new ExamenII($examenValidado);
        $nombreFoto = $request->file('foto')->store('public/');
        $examen->foto = Storage::url($nombreFoto);

        $examen->save();
        return redirect()->route('examen2.index')->with('mensaje', 'El examen se INSERTO correctamente' . request()->nombre);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamenII $examen)
    {
        return view('examen.show', ['examen'=>$examen]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamenII $examen)
    {
        return view('examen.formulario',['examen'=>$examen]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamenII $examen)
    {
        $examenValidado = request()->validate([
            'nombre'=>'required', 
            'foto' => 'mimes: jpg,png,svg,jpeg'
        ]);
        

        if($request->hasFile('foto')){
            if($examen->foto) {
                Storage::delete($examen->foto);
            }
            Storage::delete($examen->foto);
            $nombreFoto = $request->file('foto')->store('public');
            $examen->fill($examenValidado);
            $examen->foto = Storage::url($nombreFoto);
            $examen->save();
        }else{
            $examen->update($examenValidado);
        }
        return redirect()->route('examen2.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamenII $examen)
    {
        $examen->delete();
        return redirect()->route('examen2.index');
    }
}
