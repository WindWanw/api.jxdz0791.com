<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVotesToCustomerQuaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_qua', function (Blueprint $table) {
            //
            $table->unsignedInteger('p_type')->default(0)->comment("父级资质类型")->after("customer_id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_qua', function (Blueprint $table) {
            //
            $table->dropColumn(['p_type']);

        });
    }
}
