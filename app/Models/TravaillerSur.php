<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TravaillerSur
 *
 * @property string $matrcl
 * @property string $code_activite
 * @property int $idtrav
 * @property Carbon|null $date_debut
 * @property Carbon|null $date_fin
 * @property int|null $etattrs
 *
 * @property Tblper $tblper
 * @property Tblac $tblac
 *
 * @package App\Models
 */
class TravaillerSur extends Model
{
	protected $table = 'travailler_sur';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idtrav' => 'int',
		'date_debut' => 'datetime',
		'date_fin' => 'datetime',
		'etattrs' => 'int'
	];

	protected $fillable = [
		'idtrav',
		'matrcl',
        'code_activite',
        'date_debut',
        'date_fin',
        'descrip',
        'etattrs',
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
