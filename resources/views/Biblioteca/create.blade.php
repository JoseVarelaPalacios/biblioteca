@extends('Biblioteca.form')

@section('formName')
    Crear
@endsection

@section('action')
    action="{{ route('libros.store') }}"
@endsection
