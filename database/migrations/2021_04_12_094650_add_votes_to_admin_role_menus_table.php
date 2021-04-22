<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVotesToAdminRoleMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_role_menus', function (Blueprint $table) {

            $table->string("menu_actions", 512)->default('')->after("menu_id")->comment("菜单操作数据，json格式");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_role_menus', function (Blueprint $table) {
            //
        });
    }
}
