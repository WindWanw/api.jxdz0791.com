<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerFollowUpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_follow_up', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->default(0)->comment("客户ID");
            $table->unsignedInteger("user_id")->default(0)->comment("跟进人");
            $table->tinyInteger("type")->default(1)->comment("跟进方式 1.电话，2微信，3拜访");
            $table->string("remarks",512)->default("")->comment("跟进备注");
            $table->tinyInteger("status")->default(1)->comment("状态0无效，1有效");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `customer_follow_up` comment '客户跟进表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_follow_up');
    }
}
