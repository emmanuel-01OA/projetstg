<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Valider
 * 
 * @property string $matrcl_back
 * @property float $idpasst
 * @property string $matrclman
 * @property float|null $idvalid
 * @property float|null $etatpassman
 * @property Carbon|null $date_validman
 * @property float|null $etatpassbackup
 * @property Carbon|null $date_validpassback
 * @property int|null $etatv
 *
 * @package App\Models
 */
class Valider extends Model
{
	protected $table = 'valider';
	protected $primaryKey = 'idpasst';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idpasst' => 'float',
		'idvalid' => 'float',
		'etatpassman' => 'float',
		'date_validman' => 'datetime',
		'etatpassbackup' => 'float',
		'date_validpassback' => 'datetime',
		'etatv' => 'int'
	];

	protected $fillable = [
		'matrcl_back',
		'matrclman',
		'idvalid',
		'etatpassman',
		'date_validman',
		'etatpassbackup',
		'date_validpassback',
		'etatv'
	];
}
