<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->unique()->default('')->comment('角色名称');
            $table->string('describe', 255)->default('')->comment('角色描述');
            $table->unsignedInteger('create_id')->default(0)->comment('创建人id');
            $table->unsignedInteger('modifier_id')->default(0)->comment('修改人id');
            $table->unsignedTinyInteger('status')->default(0)->comment('角色状态，0不启用1启用');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `admin_roles` comment '用户角色'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_roles');
    }
}
