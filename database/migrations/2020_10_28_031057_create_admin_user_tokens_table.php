<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUserTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('access_token', 32)->unique()->default('')->comment('授权Token');
            $table->timestamp('expired_time')->comment('过期时间');

            $table->string('created_ip', 20)->default('')->comment('创建IP');
            $table->string('updated_ip', 20)->default('')->comment('更新IP');

            $table->foreign('user_id')->references('id')->on('admin_users');

            $table->timestamps();

        });

        DB::statement("ALTER TABLE `admin_user_tokens` comment '后台用户token'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user_tokens');
    }
}
