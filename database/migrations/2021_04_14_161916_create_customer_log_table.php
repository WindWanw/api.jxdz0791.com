<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_log', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->default(0)->comment("客户ID");
            $table->unsignedInteger('user_id')->default(0)->comment("用户ID");
            $table->string('info',256)->default("")->comment("信息,按配置格式写入");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `customer_log` comment '客户修改日志表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_log');
    }
}
