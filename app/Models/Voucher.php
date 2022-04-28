<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Voucher
 * 
 * @property int $id
 * @property int $booking_id
 * @property int $gsa_organization_id
 * @property int $organization_id
 * @property int $user_id
 * @property int $company_id
 * @property string $iata_code
 * @property string|null $number
 * @property int $voucher_status_id
 * @property int|null $voucher_sub_status_id
 * @property int|null $payment_file_id
 * @property int $past_due
 * @property string $account
 * @property float $booking_base_rate
 * @property float $booking_taxes
 * @property float $booking_total
 * @property float $gross_amount
 * @property float $gsa_comission_rate
 * @property bool $gsa_taxes_included
 * @property float $gsa_comission_amount
 * @property float|null $agency_comission_rate
 * @property bool|null $agency_taxes_included
 * @property float|null $agency_comission_amount
 * @property float $abg_net_amount
 * @property Carbon $issue_date
 * @property string|null $agency_file_number
 * @property int $net_rate
 * @property bool $manual_voucher
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Booking $booking
 * @property Company $company
 * @property Organization $organization
 * @property PaymentFile|null $payment_file
 * @property User $user
 * @property VoucherStatus $voucher_status
 *
 * @package App\Models
 */
class Voucher extends Model
{
	use SoftDeletes;
	protected $table = 'vouchers';

	protected $casts = [
		'booking_id' => 'int',
		'gsa_organization_id' => 'int',
		'organization_id' => 'int',
		'user_id' => 'int',
		'company_id' => 'int',
		'voucher_status_id' => 'int',
		'voucher_sub_status_id' => 'int',
		'payment_file_id' => 'int',
		'past_due' => 'int',
		'booking_base_rate' => 'float',
		'booking_taxes' => 'float',
		'booking_total' => 'float',
		'gross_amount' => 'float',
		'gsa_comission_rate' => 'float',
		'gsa_taxes_included' => 'bool',
		'gsa_comission_amount' => 'float',
		'agency_comission_rate' => 'float',
		'agency_taxes_included' => 'bool',
		'agency_comission_amount' => 'float',
		'abg_net_amount' => 'float',
		'net_rate' => 'int',
		'manual_voucher' => 'bool'
	];

	protected $dates = [
		'issue_date'
	];

	protected $fillable = [
		'booking_id',
		'gsa_organization_id',
		'organization_id',
		'user_id',
		'company_id',
		'iata_code',
		'number',
		'voucher_status_id',
		'voucher_sub_status_id',
		'payment_file_id',
		'past_due',
		'account',
		'booking_base_rate',
		'booking_taxes',
		'booking_total',
		'gross_amount',
		'gsa_comission_rate',
		'gsa_taxes_included',
		'gsa_comission_amount',
		'agency_comission_rate',
		'agency_taxes_included',
		'agency_comission_amount',
		'abg_net_amount',
		'issue_date',
		'agency_file_number',
		'net_rate',
		'manual_voucher'
	];

	public function booking()
	{
		return $this->belongsTo(Booking::class);
	}

	public function company()
	{
		return $this->belongsTo(Company::class);
	}

	public function organization()
	{
		return $this->belongsTo(Organization::class);
	}

	public function payment_file()
	{
		return $this->belongsTo(PaymentFile::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function voucher_status()
	{
		return $this->belongsTo(VoucherStatus::class);
	}
}
