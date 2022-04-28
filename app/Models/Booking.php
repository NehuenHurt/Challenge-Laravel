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
 * Class Booking
 * 
 * @property int $id
 * @property int|null $source_id
 * @property int|null $user_id
 * @property int|null $organization_id
 * @property string $name
 * @property string $last_name
 * @property string|null $guid
 * @property string $age
 * @property int $residence_country_id
 * @property string|null $email
 * @property string|null $phone
 * @property string $number
 * @property int $booking_status_id
 * @property int $pickup_office_id
 * @property int $dropoff_office_id
 * @property int $pickup_country_id
 * @property int $dropoff_country_id
 * @property int $company_id
 * @property string|null $data_serialized
 * @property string|null $params_serialized
 * @property string|null $response_serialized
 * @property string|null $wizard_number
 * @property string|null $discount_number
 * @property string|null $coupon
 * @property string|null $air_company
 * @property string|null $flight_number
 * @property string|null $frequent_flyer_program
 * @property string|null $frequent_flyer_membership
 * @property string|null $travel_agency
 * @property string|null $travel_agency_email
 * @property string|null $travel_agency_reward
 * @property string|null $car_specs
 * @property string|null $car_code
 * @property string|null $car_group
 * @property string|null $car_image
 * @property string|null $car_name
 * @property string|null $car_type
 * @property string|null $iata
 * @property int|null $id_landing
 * @property string|null $name_landing
 * @property int|null $vip_type
 * @property Carbon|null $pickup_date
 * @property Carbon|null $dropoff_date
 * @property Carbon|null $pickup_time
 * @property Carbon|null $dropoff_time
 * @property string|null $rate
 * @property float|null $base_rate
 * @property float|null $base_rate_with_taxes
 * @property float|null $taxes_total
 * @property float|null $equipment_total
 * @property float|null $estimated_total_amount
 * @property string|null $taxes
 * @property bool $manual_voucher
 * @property Carbon $issue_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Organization|null $organization
 * @property Collection|Voucher[] $vouchers
 *
 * @package App\Models
 */
class Booking extends Model
{
	use SoftDeletes;
	protected $table = 'bookings';

	protected $casts = [
		'source_id' => 'int',
		'user_id' => 'int',
		'organization_id' => 'int',
		'residence_country_id' => 'int',
		'booking_status_id' => 'int',
		'pickup_office_id' => 'int',
		'dropoff_office_id' => 'int',
		'pickup_country_id' => 'int',
		'dropoff_country_id' => 'int',
		'company_id' => 'int',
		'id_landing' => 'int',
		'vip_type' => 'int',
		'base_rate' => 'float',
		'base_rate_with_taxes' => 'float',
		'taxes_total' => 'float',
		'equipment_total' => 'float',
		'estimated_total_amount' => 'float',
		'manual_voucher' => 'bool'
	];

	protected $dates = [
		'pickup_date',
		'dropoff_date',
		'pickup_time',
		'dropoff_time',
		'issue_date'
	];

	protected $fillable = [
		'source_id',
		'user_id',
		'organization_id',
		'name',
		'last_name',
		'guid',
		'age',
		'residence_country_id',
		'email',
		'phone',
		'number',
		'booking_status_id',
		'pickup_office_id',
		'dropoff_office_id',
		'pickup_country_id',
		'dropoff_country_id',
		'company_id',
		'data_serialized',
		'params_serialized',
		'response_serialized',
		'wizard_number',
		'discount_number',
		'coupon',
		'air_company',
		'flight_number',
		'frequent_flyer_program',
		'frequent_flyer_membership',
		'travel_agency',
		'travel_agency_email',
		'travel_agency_reward',
		'car_specs',
		'car_code',
		'car_group',
		'car_image',
		'car_name',
		'car_type',
		'iata',
		'id_landing',
		'name_landing',
		'vip_type',
		'pickup_date',
		'dropoff_date',
		'pickup_time',
		'dropoff_time',
		'rate',
		'base_rate',
		'base_rate_with_taxes',
		'taxes_total',
		'equipment_total',
		'estimated_total_amount',
		'taxes',
		'manual_voucher',
		'issue_date'
	];

	public function organization()
	{
		return $this->belongsTo(Organization::class);
	}

	public function vouchers()
	{
		return $this->hasMany(Voucher::class);
	}
}
