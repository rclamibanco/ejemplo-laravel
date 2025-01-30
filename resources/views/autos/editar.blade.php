@extends('layouts.master')

@section('titulo', 'Editar auto')

@section('contenido')
    <h1>Editar auto</h1>

    <x:autos.formulario :ruta="route('autos.actualizar', $auto->id_auto)" 
        :editar="true" :marcas="$marcas" :auto="$auto" />
@endsection