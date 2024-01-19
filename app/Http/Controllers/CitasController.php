<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Medicamentos;
use App\Models\Medicos;
use App\Models\Pacientes;
use App\Models\Receta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $input = request()->txtpaciente_id;

        if (strlen($input) >= 2) {
            $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        } else {
            $p1 = substr($input, 0, 1); // Tomar la primera letra
        }

        $citas = Citas::all();

        // Recorremos las citas para obtener la información de la receta asociada
        foreach ($citas as $cita) {
            $receta = Receta::where('citas_id', $cita->id)->first();

            // Agregamos un nuevo atributo 'receta' a cada objeto $cita
            $cita->receta = $receta;
        }

        $medicamentos = Medicamentos::all();
        $user = Auth::user();
        $citasConRecetas = Citas::with('recetas.medicamentos')->get();
        $receta = new Receta();

        if ($user->role === 'medico') {
            // Si el usuario tiene el rol de médico
            $medico = $user->medicos;

            if ($medico) {
                // // Si el usuario está asociado a un médico
                // $citas = Citas::where('medicos_id', $medico->id)->get();
                // return view('citas.index', ['citas' => $citas]);
                $citas = Citas::where('medicos_id', $medico->id)
                    ->where(function ($query) use ($input) {
                        $query->where('pacientes.nombre', 'like', '%' . $input . '%')
                            ->orWhere('citas.fecha', 'like', '%' . $input . '%')
                            ->orWhere('citas.hora', 'like', '%' . $input . '%');
                    })
                    ->join('pacientes', 'citas.pacientes_id', '=', 'pacientes.id')
                    ->select('citas.*', 'pacientes.nombre as nombre_paciente')
                    ->orderBy('citas.id', 'asc')
                    ->paginate(10);

                return view('citas.index', ['citas' => $citas, 'input' => $input, 'medicamentos' => $medicamentos, 'citasConRecetas' => $citasConRecetas, 'receta' => $receta]);
            } else {
                // Si el usuario tiene el rol de médico pero no está asociado a ningún médico
                return redirect()->back()->with('mensaje', 'No estás asociado a ningún médico.');
            }
        } elseif ($user->role === 'paciente') {
            // Si el usuario tiene el rol de paciente
            $paciente = $user->pacientes;

            $citas = Citas::where('pacientes_id', $paciente->id)
                ->where(function ($query) use ($input) {
                    $query->where('medicos.nombre', 'like', '%' . $input . '%')
                        ->orWhere('citas.fecha', 'like', '%' . $input . '%')
                        ->orWhere('citas.hora', 'like', '%' . $input . '%');
                })
                ->join('medicos', 'citas.medicos_id', '=', 'medicos.id')
                ->select('citas.*', 'medicos.nombre as nombre_medico')
                ->orderBy('citas.id', 'asc')
                ->paginate(10);

            return view('citas.index', ['citas' => $citas]);
        } elseif ($user->role === 'admin') {
            // Si el usuario tiene el rol de admin, mostrar todas las citas
            // $citas = Citas::all();
            // return view('citas.index', ['citas' => $citas]);

            $input = request()->txtnombre;
            $citas = Citas::join('pacientes', 'citas.pacientes_id', '=', 'pacientes.id')
                ->where('pacientes.nombre', 'like', $p1 . '%')
                ->select('citas.*', 'pacientes.nombre as nombre_paciente')
                ->orderBy('citas.id', 'asc') // Ordenar por ID de cita en orden ascendente
                ->paginate(10);

            return view('citas.index', ['citas' => $citas, 'input' => $input]);

        } else {
            // Manejar otros roles o redirigir si no tiene el rol de médico, paciente o admin
            return redirect()->route('inicio')->with('mensaje', 'Acceso no autorizado.');
        }

        // $input = request()->txtpaciente_id;

        // if (strlen($input) >= 2) {
        //     $p1 = substr($input, 0, 2); // Tomar las dos primeras letras
        // } else {
        //     $p1 = substr($input, 0, 1); // Tomar la primera letra
        // }
        // $user = Auth::user();

        // if ($user->role === 'medico') {
        //     // Si el usuario tiene el rol de médico
        //     $medico = $user->medicos;

        //     if ($medico) {
        //         // Si el usuario está asociado a un médico
        //         $input = request()->txtpaciente_id;

        //         $citas = Citas::join('pacientes', 'citas.pacientes_id', '=', 'pacientes.id')
        //             ->where('nombre', 'like', $p1 . '%')
        //             ->where('medicos_id', $medico->id)
        //             ->where('pacientes.nombre', 'like', '%' . $input . '%')
        //             ->paginate(10);

        //         return view('citas.index', ['citas' => $citas, 'input' => $input]);
        //     } else {
        //         // Si el usuario tiene el rol de médico pero no está asociado a ningún médico
        //         return redirect()->back()->with('mensaje', 'No estás asociado a ningún médico.');
        //     }
        // } elseif ($user->role === 'paciente') {
        //     // Si el usuario tiene el rol de paciente
        //     $paciente = $user->pacientes;
        //     $input = request()->txtpaciente_id;

        //     $citas = Citas::join('medicos', 'citas.medicos_id', '=', 'medicos.id')
        //         ->where('medicos.nombre', 'like', '%' . $input . '%')
        //         ->where('citas.pacientes_id', $paciente->id)

        //         ->paginate(10);
        //     return view('citas.index', ['citas' => $citas, 'input' => $input]);
        // } elseif ($user->role === 'admin') {
        //     // Si el usuario tiene el rol de admin, mostrar todas las citas
        //     $input = request()->txtnombre;

        //     $citas = Citas::join('pacientes', 'citas.pacientes_id', '=', 'pacientes.id')
        //         ->where('nombre', 'like', $p1 . '%')
        //         ->where('pacientes.nombre', 'like', '%' . $input . '%')
        //         ->paginate(10);

        //     return view('citas.index', ['citas' => $citas, 'input' => $input]);
        // } else {
        //     // Manejar otros roles o redirigir si no tiene el rol de médico, paciente o admin
        //     return redirect()->route('inicio')->with('mensaje', 'Acceso no autorizado.');
        // }

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cita = new Citas;
        $medico = Medicos::get();
        $paciente = Pacientes::get();
        
       

        return view('citas.formulario', ['cita' => $cita, 'medico' => $medico, 'paciente' => $paciente]);
    }

    public function store(Request $request)
    {
        $citaValidado = request()->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'medicos_id' => 'required',
            'pacientes_id' => 'required',
        ], [
            'hora.required' => 'Selecione un horario',
        ]);



        Citas::create($citaValidado);
        return redirect()->route('cita.index')->with('mensaje', 'La cita se INSERTO correctamente ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Citas $cita)
    {
        // $receta = Receta::where('citas_id', $citaId)->first();

        $recetas = Receta::get();
        return view('citas.show', ['cita' => $cita, 'recetas' => $recetas]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Citas $cita)
    {
        $medico = Medicos::get();
        $paciente = Pacientes::get();
        // $receta = Receta::where('citas_id', $id)->first();
        $medicamentos = Medicamentos::all();


        return view('citas.formulario', ['cita' => $cita, 'medico' => $medico, 'paciente' => $paciente, 'medicamentos' => $medicamentos]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Citas $cita)
    {
        $citaValidado = request()->validate([
            'fecha' => 'required',
            'hora' => 'required',
            'medicos_id' => 'required',
            'pacientes_id' => 'required',
        ]);



        $cita->update($citaValidado);
        return redirect()->route('cita.index')->with('mensaje', 'La cita se ACTUALIZO correctamente ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Citas $cita)
    {
        $cita->delete();
        return redirect()->route('cita.index');
    }
}
