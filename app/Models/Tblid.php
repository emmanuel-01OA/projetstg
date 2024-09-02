<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tblid
 * 
 * @property float $id_connect
 * @property string $matrcl
 * @property string|null $eml
 * @property string|null $passw
 * @property int|null $etatidt
 * 
 * @property Tblper $tblper
 *
 * @package App\Models
 */
class Tblid extends Model
{
	protected $table = 'tblid';
	protected $primaryKey = 'id_connect';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_connect' => 'float',
		'etatidt' => 'int'
	];

	protected $fillable = [
		'matrcl',
		'eml',
		'passw',
		'etatidt'
	];

	public function tblper()
	{
		return $this->belongsTo(Tblper::class, 'matrcl');
	}
}
