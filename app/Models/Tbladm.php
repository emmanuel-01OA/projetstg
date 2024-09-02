<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tbladm
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
 *
 * @package App\Models
 */
class Tbladm extends Model
{
	protected $table = 'tbladm';
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
}
