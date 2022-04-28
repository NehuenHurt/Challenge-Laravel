<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('fk_payment_files_users1_idx');
            $table->unsignedInteger('organization_id')->index('fk_payment_files_organizations1_idx');
            $table->integer('payment_file_status_id')->index('fk_payment_files_payment_file_status1_idx');
            $table->unsignedInteger('company_id')->index('fk_payment_files_companies1_idx');
            $table->date('cycle_start');
            $table->date('cycle_end');
            $table->string('account', 50);
            $table->string('iata', 50)->nullable();
            $table->integer('vouchers_count')->nullable();
            $table->decimal('gross_amount', 15)->nullable();
            $table->decimal('commission_amount', 15)->nullable();
            $table->decimal('net_amount', 15)->nullable();
            $table->unsignedInteger('abg_user_id')->nullable();
            $table->string('comments', 1000)->nullable();
            $table->unsignedInteger('batch_file_id')->nullable()->index('fk_payment_files_payment_file_batch_files1_idx');
            $table->timestamp('extract_date')->useCurrent();
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
        Schema::dropIfExists('payment_files');
    }
}
