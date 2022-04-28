<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * 
 * @property int $id
 * @property string $name
 * @property int $display_order
 * @property int $active
 * @property string|null $logo
 * @property string|null $icon
 * 
 * @property Collection|PaymentFile[] $payment_files
 * @property Collection|Voucher[] $vouchers
 *
 * @package App\Models
 */
class Company extends Model
{
	protected $table = 'companies';
	public $timestamps = false;

	protected $casts = [
		'display_order' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'name',
		'display_order',
		'active',
		'logo',
		'icon'
	];

	public function payment_files()
	{
		return $this->hasMany(PaymentFile::class);
	}

	public function vouchers()
	{
		return $this->hasMany(Voucher::class);
	}
}
