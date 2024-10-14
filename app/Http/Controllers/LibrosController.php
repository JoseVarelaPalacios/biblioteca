<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\Generos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibrosController extends Controller
{
    public function index()
    {
        $libros = Libros::select('libros.id', 'isbn', 'nombre', 'libros.genero_id', 'sinopsis', 'paginas', 'fecha_publicacion', 'image', 'generos.genero')
            ->join('generos', 'libros.genero_id', '=', 'generos.id')
            ->get();

        $generos = Generos::all();
        return view('Biblioteca.index', compact('libros', 'generos'));
    }

    public function create()
    {
        $generos = Generos::all(); // Obtiene todos los géneros para la lista desplegable
        return view('Biblioteca.create', compact('generos')); // Pasa $generos a la vista
    }

    public function store(Request $request)
{
    $request->validate([
        'isbn' => 'required|string|max:50',
        'nombre' => 'required|string|max:100',
        'genero_id' => 'required|exists:generos,id',
        'sinopsis' => 'required|string|max:300',
        'paginas' => 'required|numeric|min:1',
        'fecha_publicacion' => 'required|date',
        'image' => 'required|image' 
    ]);
    
    $libro = Libros::create($request->all()); 

    if ($request->hasFile('image')) {
        $nombre = $libro->id . '.' . $request->file('image')->getClientOriginalExtension();
        $img = $request->file('image')->storeAs('public/img', $nombre);
        $libro->image = 'storage/img/' . $nombre; 
        $libro->save(); 
    }

    return redirect()->route('libros.index')->with('success', 'Libro creado correctamente');
}


    public function show(Libros $libros)
    {
        // $libro = $libros; // Cambiar 'Libros::find($id)' por el argumento de la función
        // $generos = Generos::all(); // Asegúrate de obtener los géneros
        // return view('', compact('libro', 'generos'));
    }

    public function edit(Libros $libro)
    {
        $generos = Generos::all(); 
        return view('Biblioteca.edit', compact('libro', 'generos')); 
    }

    public function update(Request $request, Libros $libro)
    {
        $request->validate([
            'isbn' => 'required|string|max:50', 
            'nombre' => 'required|string|max:100', 
            'genero_id' => 'required|exists:generos,id', 
            'sinopsis' => 'required|string|max:300', 
            'paginas' => 'required|numeric|min:1', 
            'fecha_publicacion' => 'required|date',
        ]);
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($libro->image);
            $nombre = $libro->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/img', $nombre);
            $libro->image = 'storage/img/' . $nombre;
            $libro->save(); 
        }
        $libro->update($request->input()); 
        return redirect()->route('libros.index')->with('success', 'Libro actualizado correctamente');
    }

    public function destroy(Libros $libro)
    {
        Storage::disk('public')->delete($libro->image);
        $libro->delete();
        return redirect()->route('libros.index')->with('success','Libro eliminado correctamente');
    }
}

