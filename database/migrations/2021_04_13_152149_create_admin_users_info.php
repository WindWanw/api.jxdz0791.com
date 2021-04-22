<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users_info', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("user_id")->default(0)->comment("用户表ID");
            $table->string("job_number",64)->default("")->comment("工号");
            $table->tinyInteger("gender")->default(1)->comment("性别：1男 2女");
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `admin_users_info` comment '用户附属表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users_info');
    }
}
