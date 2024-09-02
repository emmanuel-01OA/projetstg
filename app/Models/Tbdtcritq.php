<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tbdtcritq
 * 
 * @property int $id_crit
 * @property "char" $code_act
 * @property "char"|null $lib_crit
 * @property Carbon|null $date_deb_crit
 * @property Carbon|null $date_fin_crit
 *
 * @package App\Models
 */
class Tbdtcritq extends Model
{
	protected $table = 'tbdtcritq';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_crit' => 'int',
		'code_act' => '"char"',
		'lib_crit' => '"char"',
		'date_deb_crit' => 'datetime',
		'date_fin_crit' => 'datetime'
	];

	protected $fillable = [
		'lib_crit',
		'date_deb_crit',
		'date_fin_crit'
	];
}
