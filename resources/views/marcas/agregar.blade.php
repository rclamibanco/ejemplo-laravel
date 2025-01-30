@extends('layouts.master')

@section('titulo', 'Agregar marca')

@section('contenido')
    <h1>Agregar marca</h1>

    <x:marcas.formulario :ruta="route('marcas.guardar')" :editar="false" />
@endsection