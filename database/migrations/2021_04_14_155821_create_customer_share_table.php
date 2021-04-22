<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerShareTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_share', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->default(0)->comment("客户ID");

            $table->unsignedInteger("s_user_id")->default(0)->comment("共享ID");

            $table->tinyInteger('status')->default(1)->comment("状态：1有效,2无效");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `customer_share` comment '客户共享表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_share');
    }
}
