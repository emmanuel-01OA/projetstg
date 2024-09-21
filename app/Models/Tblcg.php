<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblcg
 *
 * @property float $idcg
 * @property string|null $lbelle_conges
 * @property string|null $ancg
 * @property int|null $etatc
 *
 * @property Collection|Planifier[] $planifiers
 *
 * @package App\Models
 */
class Tblcg extends Model
{
	protected $table = 'tblcg';
	protected $primaryKey = 'idcg';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idcg' => 'int',
		'etatc' => 'int'
	];

	protected $fillable = [
		'lbelle_conges',
		'ancg',
		'etatc'
	];

	public function planifiers()
	{
		return $this->hasMany(Planifier::class, 'idcg');
	}
}
