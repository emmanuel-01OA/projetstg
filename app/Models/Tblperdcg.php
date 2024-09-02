<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblperdcg
 * 
 * @property float $id_periode
 * @property string $matrcl
 * @property float|null $taux_rest
 * @property float|null $taux_conges
 * @property float|null $etatpc
 * 
 * @property Tblper $tblper
 *
 * @package App\Models
 */
class Tblperdcg extends Model
{
	protected $table = 'tblperdcg';
	protected $primaryKey = 'id_periode';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_periode' => 'float',
		'taux_rest' => 'float',
		'taux_conges' => 'float',
		'etatpc' => 'float'
	];

	protected $fillable = [
		'matrcl',
		'taux_rest',
		'taux_conges',
		'etatpc'
	];

	public function tblper()
	{
		return $this->belongsTo(Tblper::class, 'matrcl');
	}
}
