<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tbltyac
 * 
 * @property int $id_type_act
 * @property string|null $libelle_activite
 * @property float|null $etatyac
 * 
 * @property Collection|Tblac[] $tblacs
 *
 * @package App\Models
 */
class Tbltyac extends Model
{
	protected $table = 'tbltyac';
	protected $primaryKey = 'id_type_act';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_type_act' => 'int',
		'etatyac' => 'float'
	];

	protected $fillable = [
		'libelle_activite',
		'etatyac'
	];

	public function tblacs()
	{
		return $this->hasMany(Tblac::class, 'id_type_act');
	}
}
