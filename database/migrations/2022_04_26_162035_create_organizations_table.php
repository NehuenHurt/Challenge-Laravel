<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('organization_type_id')->index('organizations_organization_type_id_foreign');
            $table->unsignedInteger('organization_parent_id')->nullable()->index('organizations_organization_parent_id_foreign');
            $table->string('name', 100);
            $table->unsignedInteger('country_id')->nullable();
            $table->string('state', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone_code', 10)->nullable();
            $table->string('email_booking', 1000)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('email_voucher', 1000)->nullable();
            $table->boolean('booking_allowed')->default(true);
            $table->boolean('voucher_allowed')->default(true);
            $table->boolean('net_rates')->default(false);
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('promos_active')->default(0);
            $table->tinyInteger('notify_past_due')->default(1);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('organizations');
    }
}
