<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 64)->unique()->default('')->comment('用户名/账号');
            $table->string('nickname', 64)->default('')->comment('昵称');
            $table->string('phone', 16)->unique()->default('')->comment('手机号');
            $table->string('email', 255)->default('')->comment('邮箱');
            $table->string('password', 128)->default('')->comment('密码');
            $table->string('head_img', 256)->default('')->comment('头像');
            $table->unsignedInteger('logintime')->default(1)->comment('登录次数');
            $table->char('reg_ip', 15)->default('')->comment('注册IP');
            $table->unsignedInteger('reg_time')->default(0)->comment('注册时间');
            $table->char('up_ip', 15)->default('')->comment('上一次登IP');
            $table->unsignedInteger('up_time')->default(0)->comment('上一次登录时间');
            $table->char('last_ip', 15)->default('')->comment('最后登录IP');
            $table->unsignedInteger('last_time')->default(0)->comment('最后登录时间');
            $table->unsignedTinyInteger('status')->default(1)->comment('是否锁定，1启用，0禁用，99离职');

            $table->timestamps();

        });

        DB::statement("ALTER TABLE `admin_users` comment '后台用户'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
