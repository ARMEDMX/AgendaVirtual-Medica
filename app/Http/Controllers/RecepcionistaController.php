<?php

namespace App\Http\Controllers;

use App\Models\Recepcionista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecepcionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recep = Recepcionista::where('users_id', auth()->user()->id)->first();

        return view('recepcionista.index', compact('recep'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recep = new Recepcionista;
        $user = Auth::user();

        return view('recepcionista.formulario',['recep' => $recep, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $recepValidado = request()->validate([
            'nombre'=>'required', 
            'apellidop'=>'required', 
            'apellidom'=>'required',
            'users_id' => 'required'
        ]);
        
       

        Recepcionista::create($recepValidado);
        return redirect()->route('recep.index')->with('mensaje', 'La recepcionista se INSERTO correctamente ');
  
    }

    /**
     * Display the specified resource.
     */
    public function show(Recepcionista $recep)
    {
        return view('recepcionista.show', ['recep'=>$recep]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recepcionista $recep)
    {
        
        $user = Auth::user();
        return view('recepcionista.formulario',['recep'=>$recep, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recepcionista $recep)
    {
        $recepValidado = request()->validate([
            'nombre'=>'required', 
            'apellidop'=>'required', 
            'apellidom'=>'required']);
            
    
        $recep->update($recepValidado);
        return redirect()->route('recep.index')->with('mensaje', 'La recepcionista se ACTUALIZO correctamente ');
    
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recepcionista $recep)
    {
        $recep->delete();
        return redirect()->route('recep.index');
    }
}
