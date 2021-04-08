<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pid')->default(0)->comment('父级菜单id');
            $table->string('title', 50)->comment('菜单名');
            $table->string('code', 50)->comment('菜单代码');
            $table->unsignedTinyInteger('status')->default(0)->comment('菜单状态，0未启用1启用');
            $table->unsignedTinyInteger('level')->default(1)->comment('菜单等级');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `admin_menus` comment '后台菜单'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_menus');
    }
}
