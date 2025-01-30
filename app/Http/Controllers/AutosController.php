<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutosRequest;
use App\Mail\EjemploMail;
use App\Models\Auto;
use App\Models\Marca;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

date_default_timezone_set('America/El_Salvador');

class AutosController extends Controller
{
    var $notificacion = '';

    function inicio() {
        $autos = Auto::orderby('anio')->paginate(10);

        $nissan = Marca::find(8);
        $autosNissan = $nissan->autos;

        $autos2003 = Auto::where('anio', 2003)->get();

        return view('autos.inicio', compact('autos', 'autosNissan', 'autos2003'));
    }

    function agregar() {
        $marcas = Marca::orderby('nombre')->get();

        return view('autos.agregar', compact('marcas'));
    }

    function guardar(AutosRequest $request) {
        $datos = $request->validated();
        $datos['fecha_creacion'] = DB::select('select now() as fecha')[0]->fecha;

        $this->notificacion = 'El auto se registró con éxito.';

        try {
            $auto = Auto::create($datos);
            Mail::to('dennis.flores@mibanco.com.sv')->send(new EjemploMail($auto));
            notify()->success($this->notificacion, 'Realizado');
        } catch (Exception $e) {
            $this->notificacion = 'Ocurrió un error al intentar registrar el auto.';
            Log::error($e->getMessage(), [$this->notificacion]);
            notify()->error($this->notificacion);
        } finally {
            return redirect()->route('autos');
        }

        // $auto = new Auto();
        // $auto->modelo = $datos['modelo'];
        // $auto->idmarca = $datos['idmarca'];
        // $auto->anio = $datos['anio'];
        // $auto->save();

    }

    function editar($id) {
        $auto = Auto::findOrFail($id);
        $marcas = Marca::orderby('nombre')->get();
        return view('autos.editar', compact('auto', 'marcas'));
    }

    function actualizar($id, AutosRequest $request) {
        $datosActualizados = $request->validated();
        $datosActualizados['fecha_actualizacion'] = DB::select('select now() as fecha')[0]->fecha;

        Auto::where('id_auto', $id)->update($datosActualizados);
        notify()->success('El auto se actualizó con éxito', 'Realizado');

        return redirect()->route('autos');
    }

    function eliminar($id) {
        Auto::destroy($id);
        return redirect()->route('autos');
    }

    function correo(){
        $auto = Auto::find(1);
        return view('emails.notificacion', compact('auto'));
    }
}
