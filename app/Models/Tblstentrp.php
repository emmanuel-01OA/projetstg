<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblstentrp
 *
 * @property string $code_statut
 * @property string|null $type_statut
 * @property int|null $etatst
 *
 * @property Collection|Tblper[] $tblpers
 *
 * @package App\Models
 */
class Tblstentrp extends Model
{
	protected $table = 'tblstentrp';
	protected $primaryKey = 'code_statut';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'etatst' => 'int'
	];

	protected $fillable = [
		'type_statut',
		'etatst'
	];

	public function tblpers()
	{
		return $this->hasMany(Tblper::class, 'code_statut');
	}
}
