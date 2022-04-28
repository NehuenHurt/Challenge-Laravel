<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentFileStatus
 * 
 * @property int $id
 * @property string $name
 * @property int|null $display_order
 * 
 * @property Collection|PaymentFile[] $payment_files
 *
 * @package App\Models
 */
class PaymentFileStatus extends Model
{
	protected $table = 'payment_file_status';
	public $timestamps = false;

	protected $casts = [
		'display_order' => 'int'
	];

	protected $fillable = [
		'name',
		'display_order'
	];

	public function payment_files()
	{
		return $this->hasMany(PaymentFile::class);
	}
}
