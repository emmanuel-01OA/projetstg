<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblac
 * 
 * @property string $code_activite
 * @property int $id_type_act
 * @property string|null $description
 * @property int|null $etatac
 * @property Carbon|null $date_deb
 * @property Carbon|null $datefin
 * 
 * @property Tbltyac $tbltyac
 * @property Collection|TravaillerSur[] $travailler_surs
 * @property Collection|Tbldmdpasst[] $tbldmdpassts
 *
 * @package App\Models
 */
class Tblac extends Model
{
	protected $table = 'tblac';
	protected $primaryKey = 'code_activite';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_type_act' => 'int',
		'etatac' => 'int',
		'date_deb' => 'datetime',
		'datefin' => 'datetime'
	];

	protected $fillable = [
		'id_type_act',
		'description',
		'etatac',
		'date_deb',
		'datefin'
	];

	public function tbltyac()
	{
		return $this->belongsTo(Tbltyac::class, 'id_type_act');
	}

	public function travailler_surs()
	{
		return $this->hasMany(TravaillerSur::class, 'code_activite');
	}

	public function tbldmdpassts()
	{
		return $this->hasMany(Tbldmdpasst::class, 'code_activite');
	}
}
