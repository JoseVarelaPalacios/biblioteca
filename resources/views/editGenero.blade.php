@extends('layout')
@section('title')
    - Editar Género
@endsection
@section('body')
<div class="row mt-3 justify-content-center"> 
        <div class="card">
            <div class="card-header bg-dark text-white text-center"> 
                Editar género
            </div>
            <div class="card-body">
                <form id="frmGeneros" method="POST" action="{{ url('generos', [$genero]) }}">
                    @method('PUT')
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                        <input type="text" name="genero" value="{{ $genero->genero }}" class="form-control" maxlength="50" placeholder="Género" required>
                    </div>
                    <div class="d-grid col-6 mx-auto">
                        <button class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div> 
    </div> 
</div> 
@endsection
