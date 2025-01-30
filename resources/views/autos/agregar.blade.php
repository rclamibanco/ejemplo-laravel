@extends('layouts.master')

@section('titulo', 'Agregar auto')

@section('contenido')
    <h1>Agregar auto</h1>

    <x:autos.formulario :ruta="route('autos.guardar')" :editar="false" :marcas="$marcas" />
@endsection