<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string("number",32)->unique()->comment("客户编号");
            $table->string("name",128)->default("")->comment("客户名称");

            $table->tinyInteger("type")->default(0)->comment("业务类别");
            $table->tinyInteger("customer_state")->default(0)->comment("客户状态");

            $table->unsignedInteger("province")->default(0)->comment("地区省");
            $table->unsignedInteger("city")->default(0)->comment("地区市");
            $table->unsignedInteger("area")->default(0)->comment("地区");

            $table->date("establish_date")->nullable()->comment("成立日期");

            $table->string("introduce",512)->default("")->comment("客户介绍");
            $table->string("company_qua_remarks",512)->default("")->comment("企业资质备注");
            $table->date("anxu_val_time")->nullable()->comment("安许有效日期");
            $table->string("enclosure",512)->default("")->comment("附件多条json");


            $table->tinyInteger("source")->default(0)->comment("来源1.400,2微信");
            $table->unsignedInteger("w_user_id")->default(0)->comment("录入人员");
            $table->unsignedInteger("res_user_id")->default(0)->comment("负责人员");

            $table->tinyInteger("share")->default(0)->comment("是否共享0否，1是");
            $table->tinyInteger("status")->default(1)->comment("状态0无效，1有效");



            $table->timestamps();
        });

        DB::statement("ALTER TABLE `customer` comment '客户表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
