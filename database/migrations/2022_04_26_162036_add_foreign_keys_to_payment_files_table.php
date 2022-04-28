<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPaymentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_files', function (Blueprint $table) {
            $table->foreign(['payment_file_status_id'], 'fk_payment_files_payment_file_status1')->references(['id'])->on('payment_file_status');
            $table->foreign(['organization_id'], 'fk_payment_files_organizations1')->references(['id'])->on('organizations');
            $table->foreign(['user_id'], 'fk_payment_files_users1')->references(['id'])->on('users');
            $table->foreign(['company_id'], 'fk_payment_files_companies1')->references(['id'])->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_files', function (Blueprint $table) {
            $table->dropForeign('fk_payment_files_payment_file_status1');
            $table->dropForeign('fk_payment_files_organizations1');
            $table->dropForeign('fk_payment_files_users1');
            $table->dropForeign('fk_payment_files_companies1');
        });
    }
}
