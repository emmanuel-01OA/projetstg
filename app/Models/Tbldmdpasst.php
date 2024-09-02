<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tbldmdpasst
 * 
 * @property float $idpasst
 * @property string $matrcl
 * @property string $code_activite
 * @property string|null $libpasst
 * @property int|null $pourcen_travail_eff
 * @property Carbon|null $datedmd
 * @property int|null $etatd
 * @property string|null $attach
 * @property string|null $descption
 * 
 * @property Tblper $tblper
 * @property Tblac $tblac
 *
 * @package App\Models
 */
class Tbldmdpasst extends Model
{
	protected $table = 'tbldmdpasst';
	protected $primaryKey = 'idpasst';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idpasst' => 'float',
		'pourcen_travail_eff' => 'int',
		'datedmd' => 'datetime',
		'etatd' => 'int'
	];

	protected $fillable = [
		'matrcl',
		'code_activite',
		'libpasst',
		'pourcen_travail_eff',
		'datedmd',
		'etatd',
		'attach',
		'descption'
	];

	public function tblper()
	{
		return $this->belongsTo(Tblper::class, 'matrcl');
	}

	public function tblac()
	{
		return $this->belongsTo(Tblac::class, 'code_activite');
	}
}
