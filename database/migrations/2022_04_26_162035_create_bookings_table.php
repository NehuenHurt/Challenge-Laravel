<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('source_id')->nullable();
            $table->unsignedInteger('user_id')->nullable()->index('bookings_FK');
            $table->unsignedInteger('organization_id')->nullable()->index('organization_id');
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->char('guid', 36)->nullable();
            $table->string('age', 100);
            $table->unsignedInteger('residence_country_id')->index('CountryOfResidence');
            $table->string('email', 100)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('number', 100);
            $table->unsignedInteger('booking_status_id')->index('bookings_booking_status_id_IDX');
            $table->unsignedInteger('pickup_office_id')->index('CodeLongPickUp');
            $table->unsignedInteger('dropoff_office_id')->index('CodeLongDropOff');
            $table->unsignedInteger('pickup_country_id')->index('CountryPickUp');
            $table->unsignedInteger('dropoff_country_id')->index('CountryDropOff');
            $table->unsignedInteger('company_id')->index('Company');
            $table->text('data_serialized')->nullable();
            $table->text('params_serialized')->nullable();
            $table->text('response_serialized')->nullable();
            $table->string('wizard_number', 100)->nullable();
            $table->string('discount_number', 100)->nullable();
            $table->string('coupon', 100)->nullable();
            $table->string('air_company', 100)->nullable();
            $table->string('flight_number', 100)->nullable();
            $table->string('frequent_flyer_program', 100)->nullable();
            $table->string('frequent_flyer_membership', 100)->nullable();
            $table->string('travel_agency', 100)->nullable();
            $table->string('travel_agency_email', 100)->nullable();
            $table->string('travel_agency_reward', 100)->nullable();
            $table->text('car_specs')->nullable();
            $table->string('car_code', 100)->nullable();
            $table->string('car_group', 100)->nullable();
            $table->text('car_image')->nullable();
            $table->string('car_name', 100)->nullable();
            $table->string('car_type', 100)->nullable();
            $table->string('iata', 100)->nullable();
            $table->unsignedInteger('id_landing')->nullable();
            $table->string('name_landing', 100)->nullable();
            $table->unsignedInteger('vip_type')->nullable();
            $table->date('pickup_date')->nullable();
            $table->date('dropoff_date')->nullable();
            $table->time('pickup_time')->nullable();
            $table->time('dropoff_time')->nullable();
            $table->string('rate', 100)->nullable();
            $table->decimal('base_rate', 15)->nullable();
            $table->decimal('base_rate_with_taxes', 15)->nullable();
            $table->decimal('taxes_total', 15)->nullable();
            $table->decimal('equipment_total', 15)->nullable();
            $table->decimal('estimated_total_amount', 15)->nullable();
            $table->text('taxes')->nullable();
            $table->boolean('manual_voucher')->default(false);
            $table->timestamp('issue_date')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
