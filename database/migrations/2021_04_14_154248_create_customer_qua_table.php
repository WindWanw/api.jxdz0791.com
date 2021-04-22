<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerQuaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_qua', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->default(0)->comment("客户ID");

            $table->unsignedInteger('type')->default(0)->comment("资质类型");
            $table->date("val_time")->nullable()->comment("资质有效期");
            $table->tinyInteger("status")->default(1)->comment("状态0无效，1有效");

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `customer_qua` comment '客户资质表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_qua');
    }
}
