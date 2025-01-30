<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Marca
 * 
 * @property int $id
 * @property string $nombre
 * 
 * @property Collection|Auto[] $autos
 *
 * @package App\Models
 */
class Marca extends Model
{
	protected $table = 'marcas';
	public $timestamps = false;

	protected $fillable = [
		'nombre'
	];

	public function autos()
	{
		return $this->hasMany(Auto::class, 'idmarca');
	}
}
