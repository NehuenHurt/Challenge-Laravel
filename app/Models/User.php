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
 * Class User
 * 
 * @property int $id
 * @property int $organization_id
 * @property string $name
 * @property string|null $last_name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $photo
 * @property string|null $gender
 * @property int $active
 * @property bool|null $terms_and_conditions
 * @property string|null $language_code
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|PaymentFile[] $payment_files
 * @property Collection|Voucher[] $vouchers
 *
 * @package App\Models
 */
use Illuminate\Foundation\Auth\User as Authenticatable;   
class User extends Authenticatable
{
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'active' => 'int',
		'terms_and_conditions' => 'bool'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'last_name',
		'email',
		'email_verified_at',
		'password',
		'photo',
		'gender',
		'active',
		'terms_and_conditions',
		'language_code',
		'remember_token'
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
