<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('booking_id')->index('fk_vouchers_bookings1_idx');
            $table->unsignedInteger('gsa_organization_id')->index('fk_vouchers_organizations1_idx');
            $table->unsignedInteger('organization_id')->index('fk_vouchers_organizations2_idx');
            $table->unsignedInteger('user_id')->index('fk_vouchers_users1_idx');
            $table->unsignedInteger('company_id')->index('fk_vouchers_companies1_idx');
            $table->string('iata_code', 50);
            $table->string('number', 50)->nullable()->index('vouchers_number_IDX');
            $table->integer('voucher_status_id')->index('fk_vouchers_voucher_status1_idx');
            $table->unsignedInteger('voucher_sub_status_id')->nullable();
            $table->unsignedInteger('payment_file_id')->nullable()->index('fk_vouchers_payment_files1_idx')->comment('Esta columna identifica el lote en el que es incluido este voucher.\nSi el lote se rechaza, este campo se blanquea. (queda la información en payment_file_vouchers)\n');
            $table->unsignedTinyInteger('past_due')->default('1');
            $table->string('account', 50);
            $table->decimal('booking_base_rate', 15);
            $table->decimal('booking_taxes', 15);
            $table->decimal('booking_total', 15);
            $table->decimal('gross_amount', 15)->comment('El monto por el cual se generó el Voucher.\ndebe corresponder con el booking_base_rate o booking_total.\n');
            $table->decimal('gsa_comission_rate', 10);
            $table->boolean('gsa_taxes_included')->comment('Indica si comisiona sobre los impuestos\n');
            $table->decimal('gsa_comission_amount', 15)->comment('Importe calculado de la comisión GSA.');
            $table->decimal('agency_comission_rate', 10)->nullable()->comment('Comisión de la Agencia.');
            $table->boolean('agency_taxes_included')->nullable()->comment('Si comisiona sobre los impuestos.');
            $table->decimal('agency_comission_amount', 10)->nullable();
            $table->decimal('abg_net_amount', 15)->comment('Importe correspondiente a ABG. (gross_amount - gsa_comission_amount)\n');
            $table->timestamp('issue_date')->useCurrent();
            $table->string('agency_file_number', 100)->nullable();
            $table->unsignedInteger('net_rate')->default('0')->comment('Las tarifas netas tienen valor 1');
            $table->boolean('manual_voucher')->default(false);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}
