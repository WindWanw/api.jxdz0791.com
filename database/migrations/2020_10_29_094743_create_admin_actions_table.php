<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 64)->comment('接口名');
            $table->string('router', 64)->default('/')->comment('路由');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `admin_actions` comment '菜单操作'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_actions');
    }
}
