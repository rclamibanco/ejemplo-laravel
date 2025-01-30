@extends('layouts.master')

@section('titulo', 'Editar marca')

@section('contenido')
    <h1>Editar marca: {{ $marca->nombre }}</h1>
    
    <x:marcas.formulario 
        :ruta="route('marcas.actualizar', $marca->id)" 
        :editar="true" 
        :marca="$marca->nombre"
    />

    <a href="{{ route('marcas') }}" class="mt-3 btn btn-secondary">
        Volver
    </a>
@endsection