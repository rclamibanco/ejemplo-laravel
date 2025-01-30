@extends('layouts.master')

@section('titulo', 'Marcas')

@section('contenido')
    <h1 class="my-3">Marcas registradas</h1>

    <a href="{{ route('marcas.agregar') }}" class="btn btn-success mb-3">
        Agregar marca (+)
    </a>

    <form action="{{ route('marcas') }}" class="row mb-4">
        <div class="col-6">
            <input type="search" name="buscar" class="form-control" value="{{ Request::get('buscar') }}">
        </div>
        <div class="col-3">
            <button type="submit" class="btn btn-info">
                Buscar
            </button>
        </div>
    </form>

    <div class="row">
        <div class="table-responsive">
            {{ $marcas->links() }}
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marcas as $marca)
                        <tr>
                            <td>{{ $marca->id }}</td>
                            <td>{{ $marca->nombre }}</td>
                            <td>
                                <a href="{{ route('marcas.editar', $marca->id) }}" class="btn btn-warning">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('marcas.eliminar', $marca->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
