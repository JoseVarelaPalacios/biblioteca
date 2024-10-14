@extends('layout')
@section('title')
    - @yield('formName')
@endsection
@section('body')

@if($errors->any())
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-danger">
            <p><b><i class="fa-solid fa-times"></i> Errores</b></p>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">@yield('formName')</div>
            <div class="card-body">
                <form @yield('action') method="POST" enctype="multipart/form-data">
                    @yield('method')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                        <input type="text" name="isbn" class="form-control" maxlength="50" placeholder="ISBN" 
                        @isset($libro) value="{{ $libro->isbn }}" @endisset required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                        <input type="text" name="nombre" class="form-control" maxlength="100" placeholder="Título" 
                        @isset($libro) value="{{ $libro->nombre }}" @endisset required>
                    </div>
                    
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-tags"></i></span>
                        <select name="genero_id" class="form-select" required>
                            <option value="">Género</option>
                            @foreach($generos as $row)
                                <option value="{{ $row->id }}" 
                                    @isset($libro) @if($libro->genero_id == $row->id) selected @endif @endisset>
                                    {{ $row->genero }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-align-left"></i></span>
                        <input type="text" name="sinopsis" class="form-control" maxlength="150" placeholder="Sinopsis" 
                        @isset($libro) value="{{ $libro->sinopsis }}" @endisset required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                        <input type="number" name="paginas" class="form-control" maxlength="5" placeholder="Páginas" 
                        @isset($libro) value="{{ $libro->paginas }}" @endisset required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                        <input type="date" name="fecha_publicacion" class="form-control" 
                        @isset($libro) value="{{ $libro->fecha_publicacion }}" @endisset required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <input type="file" name="image" class="form-control" @if(!isset($libro)) required @endif accept="image/*">
                    </div>
                    <button class="btn btn-success" type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
