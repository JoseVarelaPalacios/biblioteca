<?php

namespace App\Http\Controllers;

use App\Models\Generos;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Generos::all();
        return view('generos', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genero = new Generos($request->input());
        $genero->saveOrFail();
        return redirect('generos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Generos $genero)
    {
        //$genero = Generos::find($id);
        return view('editGenero', compact('genero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generos $genero) // Cambié 'generos' a 'genero'
    {
        //
    }

    public function update(Request $request, Generos $genero)
    {
        $genero->fill($request->input())->saveOrFail();
        return redirect('generos');
    }

    public function destroy(Generos $genero)
    {
        $genero->delete();
        return redirect('generos');
    }
}
