<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddsLicenseSubscriptionFieldsToLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('licenses', function (Blueprint $table) {
            //
            $table->Boolean('is_subscription')->default(false);
            $table->decimal('subscription_seat_price', 8, 2)->default(0.00);
            $table->set('subscription_period', ['monthly', 'yearly'])->default('monthly');
            $table->integer('subscription_length')->default(12);
            $table->Boolean('auto_renew')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('licenses', function (Blueprint $table) {
            //
            $table->dropColumn('is_subscription');
            $table->dropColumn('subscription_seat_price');
            $table->dropColumn('subscription_period');
            $table->dropColumn('subscription_length');
            $table->dropColumn('auto_renew');
        });
    }
}
