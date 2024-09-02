<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblfonc
 *
 * @property float $code_fonct
 * @property string|null $libelle_fonct
 * @property int|null $etatf
 *
 * @property Collection|Tblper[] $tblpers
 *
 * @package App\Models
 */
class Tblfonc extends Model
{
	protected $table = 'tblfonc';
	protected $primaryKey = 'code_fonct';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'code_fonct' => 'float',
		'etatf' => 'int'
	];

	protected $fillable = [
        'code_fonct',
		'libelle_fonct',
		'etatf'
	];

	public function tblpers()
	{
		return $this->hasMany(Tblper::class, 'code_fonct');
	}
}
