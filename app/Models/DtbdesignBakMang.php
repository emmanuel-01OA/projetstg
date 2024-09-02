<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DtbdesignBakMang
 * 
 * @property int $id
 * @property "char" $matrcl_pers
 * @property "char" $matrcl_back
 *
 * @package App\Models
 */
class DtbdesignBakMang extends Model
{
	protected $table = 'dtbdesign_bak_mang';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'matrcl_pers' => '"char"',
		'matrcl_back' => '"char"'
	];
}
