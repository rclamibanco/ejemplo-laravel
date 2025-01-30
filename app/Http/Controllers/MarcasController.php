<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Rules\EditarUnico;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    function inicio(Request $request) {
        $marcas = Marca::select('id', 'nombre');

        if (strlen($request->buscar) > 0) {
            $marcas = $marcas->where('nombre', 'LIKE', "%$request->buscar%");
        }

        $marcas = $marcas->orderby('nombre')->paginate(10)->withQueryString();

        return view('marcas.inicio', compact('marcas'));
    }

    function agregar() {
        return view('marcas.agregar');
    }

    function guardar(Request $request) {
        $request->validate([
            'nombre' => 'required|min:3|unique:marcas'
        ]);

        $marca = new Marca();
        $marca->nombre = $request->nombre;
        $marca->save();

        return redirect()->route('marcas');
    }

    function editar($id) {
        $marca = Marca::findOrFail($id);
        return view('marcas.editar', compact('marca'));
    }

    function actualizar($id, Request $request) {
        $request->validate([
            'nombre' => ['required', 'min:3', new EditarUnico($id)]
        ]);

        Marca::where('id', $id)->update([
            'nombre' => $request->nombre
        ]);
        return redirect()->route('marcas');
    }

    function eliminar($id) {
        Marca::destroy($id);
        return redirect()->route('marcas');
    }
}
