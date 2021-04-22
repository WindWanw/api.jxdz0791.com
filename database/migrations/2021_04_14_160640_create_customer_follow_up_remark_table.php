<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerFollowUpRemarkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_follow_up_remark', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_follow_id')->default(0)->comment("跟进表ID");
            $table->unsignedInteger("user_id")->default(0)->comment("批注人");
            $table->string("remark",256)->default("")->comment("批注内容");
            $table->tinyInteger("status")->default(1)->comment("状态0无效，1有效");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `customer_follow_up_remark` comment '客户跟进批注表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_follow_up_remark');
    }
}
