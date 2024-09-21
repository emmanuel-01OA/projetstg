<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Planifier
 *
 * @property string $matrcl
 * @property float $idcg
 * @property float $id_p
 * @property Carbon|null $date_depart
 * @property Carbon|null $date_arrive
 * @property int|null $etatf
 * @property float|null $taux_plcg
 * @property string|null $man_matricule
 *
 * @property Tblper $tblper
 * @property Tblcg $tblcg
 * @property Tblman|null $tblman
 *
 * @package App\Models
 */
class Planifier extends Model
{
	protected $table = 'planifier';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idcg' => 'int',
		'id_p' => 'int',
		'date_depart' => 'datetime',
		'date_arrive' => 'datetime',
		'etatf' => 'int',
		'taux_plcg' => 'float'
	];

	protected $fillable = [
		'id_p',
		'date_depart',
		'date_arrive',
		'etatf',
		'taux_plcg',
		'man_matricule'
	];

	public function tblper()
	{
		return $this->belongsTo(Tblper::class, 'matrcl');
	}

	public function tblcg()
	{
		return $this->belongsTo(Tblcg::class, 'idcg');
	}

	public function tblman()
	{
		return $this->belongsTo(Tblman::class, 'man_matricule');
	}
}
