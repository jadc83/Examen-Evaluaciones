<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Models\Alumno;
use App\Models\Ce;
use Illuminate\Http\Request;
use SebastianBergmann\Diff\Diff;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();

        return view('alumnos.index', ['alumnos' => $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
       $alumno = new Alumno();

       $validado = $request->validate([
            'nombre' => 'required|string|max:60'
       ]);

       $alumno->fill($validado);
       $alumno->save();

       return redirect()->route('alumnos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {

        $evaluados = $alumno->ccee;

        $ccee = Ce::whereNotIn('id', $evaluados->pluck('id'))->get();

        return view('alumnos.show', ['alumno' => $alumno, 'ccee' => $ccee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', ['alumno' => $alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $validado = $request->validate([
            'nombre' => 'required|string|max:60'
        ]);

        $alumno->update($validado);
        $alumno->save();

        return redirect()->route('alumnos.show', ['alumno' => $alumno]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        return redirect()->route('alumnos.index');
    }

    public function evaluar(Request $request, Alumno $alumno)
    {

        $ce = Ce::where('id', $request->criterio_id)->first();
        $alumno->ccee()->attach($ce->id, ['nota' => $request->nota]);

        return redirect()->route('alumnos.show', ['alumno' => $alumno]);

    }
}
