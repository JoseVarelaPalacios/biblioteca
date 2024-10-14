@extends('layout')
@section('title')
    - Libros
@endsection
@section('body')

@if (session('success'))
<div class="row" id="alerta">
    <div class="col-md-4 offset-md-4">
        <div class="alert alert-success">
            <p><i class="fa-solid fa-check"></i> {{ session('success') }} </p>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="table-responsive"> 
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ISBN</th>
                        <th>TITULO</th>
                        <th>GENERO</th>
                        <th>SINOPSIS</th>
                        <th>PAGINAS</th>
                        <th>FECHA DE PUBLICACION</th>
                        <th>IMAGEN</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libros as $i => $row)
                        <tr>
                            <td>{{ ($i+1) }}</td>
                            <td>{{ $row->isbn }}</td>
                            <td>{{ $row->nombre }}</td>
                            <td>{{ $row->genero }}</td>
                            <td>{{ $row->sinopsis }}</td>
                            <td>{{ $row->paginas }}</td>
                            <td>{{ $row->fecha_publicacion }}</td>
                            <td>
                                <img class="img-fluid" width="70" src="{{ asset($row->image) }}"> 
                            </td>
                            
                            <td>
                                <a class="btn btn-warning" href="{{ route('libros.edit', $row->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </td>
                            <td>
                                <form id="frm_{{ $row->id }}" method="POST" action="{{ route('libros.destroy', $row->id) }}">
                                    @csrf
                                    @method('DELETE') 
                                    <button 
                                     type="submit" class="btn btn-danger">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
@section('js')
@vite('resources/js/Biblioteca/index.js')
@endsection

