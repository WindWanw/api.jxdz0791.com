<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_contact', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->default(0)->comment("客户ID");

            $table->string('name',64)->default(0)->comment("联系人");
            $table->string('phone',18)->default(0)->comment("电话号码");
            $table->tinyInteger('phone_status')->default(1)->comment("状态：1正常,2空号");

            $table->tinyInteger("status")->default(1)->comment("状态0无效，1有效");

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `customer_contact` comment '客户联系表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_contact');
    }
}
