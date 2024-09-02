<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblper
 * 
 * @property string $matrcl
 * @property string $code_statut
 * @property float $code_fonct
 * @property string|null $nam
 * @property string|null $renam
 * @property string|null $eml
 * @property string|null $conta
 * @property float|null $ty_user
 * @property int|null $etatp
 * 
 * @property Tblstentrp $tblstentrp
 * @property Tblfonc $tblfonc
 * @property Tbladm $tbladm
 * @property Tblbackp $tblbackp
 * @property Collection|Tblid[] $tblids
 * @property Tblman $tblman
 * @property Collection|Tblperdcg[] $tblperdcgs
 * @property Collection|TravaillerSur[] $travailler_surs
 * @property Collection|Planifier[] $planifiers
 * @property Collection|Tbldmdpasst[] $tbldmdpassts
 *
 * @package App\Models
 */
class Tblper extends Model
{
	protected $table = 'tblper';
	protected $primaryKey = 'matrcl';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code_fonct' => 'float',
		'ty_user' => 'float',
		'etatp' => 'int'
	];

	protected $fillable = [
		'code_statut',
		'code_fonct',
		'nam',
		'renam',
		'eml',
		'conta',
		'ty_user',
		'etatp'
	];

	public function tblstentrp()
	{
		return $this->belongsTo(Tblstentrp::class, 'code_statut');
	}

	public function tblfonc()
	{
		return $this->belongsTo(Tblfonc::class, 'code_fonct');
	}

	public function tbladm()
	{
		return $this->hasOne(Tbladm::class, 'matrcl');
	}

	public function tblbackp()
	{
		return $this->hasOne(Tblbackp::class, 'matrcl');
	}

	public function tblids()
	{
		return $this->hasMany(Tblid::class, 'matrcl');
	}

	public function tblman()
	{
		return $this->hasOne(Tblman::class, 'matrcl');
	}

	public function tblperdcgs()
	{
		return $this->hasMany(Tblperdcg::class, 'matrcl');
	}

	public function travailler_surs()
	{
		return $this->hasMany(TravaillerSur::class, 'matrcl');
	}

	public function planifiers()
	{
		return $this->hasMany(Planifier::class, 'matrcl');
	}

	public function tbldmdpassts()
	{
		return $this->hasMany(Tbldmdpasst::class, 'matrcl');
	}
}
