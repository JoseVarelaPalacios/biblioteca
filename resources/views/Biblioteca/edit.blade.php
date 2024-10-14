@extends('Biblioteca.form')

@section('formName')
    Editar a <b>{{ $libro->nombre }}</b> 
@endsection

@section('action')
    action="{{ route('libros.update', $libro) }}" 
@endsection

@section('method')
    @method('PUT')
@endsection
