<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VoucherStatus
 * 
 * @property int $id
 * @property string|null $name
 * @property int|null $display_order
 * 
 * @property Collection|Voucher[] $vouchers
 *
 * @package App\Models
 */
class VoucherStatus extends Model
{
	protected $table = 'voucher_status';
	public $timestamps = false;

	protected $casts = [
		'display_order' => 'int'
	];

	protected $fillable = [
		'name',
		'display_order'
	];

	public function vouchers()
	{
		return $this->hasMany(Voucher::class);
	}
}
