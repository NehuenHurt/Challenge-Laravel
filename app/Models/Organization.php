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
 * Class Organization
 * 
 * @property int $id
 * @property int $organization_type_id
 * @property int|null $organization_parent_id
 * @property string $name
 * @property int|null $country_id
 * @property string|null $state
 * @property string|null $city
 * @property string|null $zipcode
 * @property string|null $address
 * @property string|null $email
 * @property string|null $phone_code
 * @property string|null $email_booking
 * @property string|null $phone
 * @property string|null $email_voucher
 * @property bool $booking_allowed
 * @property bool $voucher_allowed
 * @property bool $net_rates
 * @property int $active
 * @property int $promos_active
 * @property int $notify_past_due
 * @property float|null $latitude
 * @property float|null $longitude
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Organization|null $organization
 * @property Collection|Booking[] $bookings
 * @property Collection|Organization[] $organizations
 * @property Collection|PaymentFile[] $payment_files
 * @property Collection|Voucher[] $vouchers
 *
 * @package App\Models
 */
class Organization extends Model
{
	use SoftDeletes;
	protected $table = 'organizations';

	protected $casts = [
		'organization_type_id' => 'int',
		'organization_parent_id' => 'int',
		'country_id' => 'int',
		'booking_allowed' => 'bool',
		'voucher_allowed' => 'bool',
		'net_rates' => 'bool',
		'active' => 'int',
		'promos_active' => 'int',
		'notify_past_due' => 'int',
		'latitude' => 'float',
		'longitude' => 'float'
	];

	protected $fillable = [
		'organization_type_id',
		'organization_parent_id',
		'name',
		'country_id',
		'state',
		'city',
		'zipcode',
		'address',
		'email',
		'phone_code',
		'email_booking',
		'phone',
		'email_voucher',
		'booking_allowed',
		'voucher_allowed',
		'net_rates',
		'active',
		'promos_active',
		'notify_past_due',
		'latitude',
		'longitude'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class, 'organization_parent_id');
	}

	public function bookings()
	{
		return $this->hasMany(Booking::class);
	}

	public function organizations()
	{
		return $this->hasMany(Organization::class, 'organization_parent_id');
	}

	public function payment_files()
	{
		return $this->hasMany(PaymentFile::class);
	}

	public function vouchers()
	{
		return $this->hasMany(Voucher::class);
	}
}
