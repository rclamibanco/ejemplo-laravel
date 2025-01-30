@extends('layouts.master')

@section('titulo', 'Marcas')

@section('contenido')
    <h1 class="my-3">Carros registrados</h1>

    <h3>Este es mi cambio, soy Carlos</h3>

    <a href="{{ route('autos.agregar') }}" class="btn btn-success mb-3">
        Agregar auto (+)
    </a>

    <div class="row">
        <div class="table-responsive">
            {{ $autos->links() }}
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($autos as $auto)
                        <tr>
                            <td>{{ $auto->id_auto }}</td>
                            <td>{{ $auto->marca->nombre }}</td>
                            <td>{{ $auto->modelo }}</td>
                            <td>{{ $auto->anio }}</td>
                            <td>
                                <a href="{{ route('autos.editar', $auto->id_auto) }}" class="btn btn-warning">
                                    Editar
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('autos.eliminar', $auto->id_auto) }}" method="POST">
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

    <h3>Autos Nissan de David</h3>

    <ul>
        @foreach ($autosNissan as $auto)
            <li>{{ $auto->anio . ' ' . $auto->modelo  }}</li>
        @endforeach
    </ul>

    <h3>Autos del 2003 de David</h3>

    <ul>
        @foreach ($autos2003 as $auto)
            <li>{{ $auto->modelo  }}</li>
        @endforeach
    </ul>

    <h5>Este es el cambio que hizo Dennis</h5>
@endsection