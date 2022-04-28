<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PaymentFile
 * 
 * @property int $id
 * @property int $user_id
 * @property int $organization_id
 * @property int $payment_file_status_id
 * @property int $company_id
 * @property Carbon $cycle_start
 * @property Carbon $cycle_end
 * @property string $account
 * @property string|null $iata
 * @property int|null $vouchers_count
 * @property float|null $gross_amount
 * @property float|null $commission_amount
 * @property float|null $net_amount
 * @property int|null $abg_user_id
 * @property string|null $comments
 * @property int|null $batch_file_id
 * @property Carbon $extract_date
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Company $company
 * @property Organization $organization
 * @property PaymentFileStatus $payment_file_status
 * @property User $user
 * @property Collection|Voucher[] $vouchers
 *
 * @package App\Models
 */
class PaymentFile extends Model
{
	use SoftDeletes;
	protected $table = 'payment_files';

	protected $casts = [
		'user_id' => 'int',
		'organization_id' => 'int',
		'payment_file_status_id' => 'int',
		'company_id' => 'int',
		'vouchers_count' => 'int',
		'gross_amount' => 'float',
		'commission_amount' => 'float',
		'net_amount' => 'float',
		'abg_user_id' => 'int',
		'batch_file_id' => 'int'
	];

	protected $dates = [
		'cycle_start',
		'cycle_end',
		'extract_date'
	];

	protected $fillable = [
		'user_id',
		'organization_id',
		'payment_file_status_id',
		'company_id',
		'cycle_start',
		'cycle_end',
		'account',
		'iata',
		'vouchers_count',
		'gross_amount',
		'commission_amount',
		'net_amount',
		'abg_user_id',
		'comments',
		'batch_file_id',
		'extract_date'
	];

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function organization()
	{
		return $this->belongsTo(Organization::class);
	}

	public function payment_file_status()
	{
		return $this->belongsTo(PaymentFileStatus::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function vouchers()
	{
		return $this->hasMany(Voucher::class);
	}
}
