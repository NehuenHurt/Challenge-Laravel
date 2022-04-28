<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->foreign(['gsa_organization_id'], 'fk_vouchers_organizations1')->references(['id'])->on('organizations');
            $table->foreign(['payment_file_id'], 'fk_vouchers_payment_files1')->references(['id'])->on('payment_files');
            $table->foreign(['voucher_status_id'], 'fk_vouchers_voucher_status1')->references(['id'])->on('voucher_status');
            $table->foreign(['company_id'], 'fk_vouchers_companies1')->references(['id'])->on('companies');
            $table->foreign(['organization_id'], 'fk_vouchers_organizations2')->references(['id'])->on('organizations');
            $table->foreign(['user_id'], 'fk_vouchers_users1')->references(['id'])->on('users');
            $table->foreign(['booking_id'], 'fk_vouchers_bookings1')->references(['id'])->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropForeign('fk_vouchers_organizations1');
            $table->dropForeign('fk_vouchers_payment_files1');
            $table->dropForeign('fk_vouchers_voucher_status1');
            $table->dropForeign('fk_vouchers_companies1');
            $table->dropForeign('fk_vouchers_organizations2');
            $table->dropForeign('fk_vouchers_users1');
            $table->dropForeign('fk_vouchers_bookings1');
        });
    }
}
