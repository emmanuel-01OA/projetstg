<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblman
 * 
 * @property string $matrcl
 * @property string|null $code_status
 * @property float|null $code_fonct
 * @property string|null $nam
 * @property string|null $renam
 * @property string|null $eml
 * @property string|null $conta
 * @property float|null $ty_user
 * @property int|null $etatp
 * 
 * @property Tblper $tblper
 * @property Collection|Planifier[] $planifiers
 *
 * @package App\Models
 */
class Tblman extends Model
{
	protected $table = 'tblman';
	protected $primaryKey = 'matrcl';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code_fonct' => 'float',
		'ty_user' => 'float',
		'etatp' => 'int'
	];

	protected $fillable = [
		'code_status',
		'code_fonct',
		'nam',
		'renam',
		'eml',
		'conta',
		'ty_user',
		'etatp'
	];

	public function tblper()
	{
		return $this->belongsTo(Tblper::class, 'matrcl');
	}

	public function planifiers()
	{
		return $this->hasMany(Planifier::class, 'man_matricule');
	}
}
