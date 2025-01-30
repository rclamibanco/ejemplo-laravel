<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Auto
 * 
 * @property int $id_auto
 * @property string $modelo
 * @property int $idmarca
 * @property string $anio
 * @property Carbon|null $fecha_creacion
 * @property Carbon|null $fecha_actualizacion
 * 
 * @property Marca $marca
 *
 * @package App\Models
 */
class Auto extends Model
{
	protected $table = 'autos';
	protected $primaryKey = 'id_auto';
	public $timestamps = false;

	protected $casts = [
		'idmarca' => 'int',
		'fecha_creacion' => 'datetime',
		'fecha_actualizacion' => 'datetime'
	];

	protected $fillable = [
		'modelo',
		'idmarca',
		'anio',
		'fecha_creacion',
		'fecha_actualizacion'
	];

	public function marca()
	{
		return $this->belongsTo(Marca::class, 'idmarca');
	}
}
