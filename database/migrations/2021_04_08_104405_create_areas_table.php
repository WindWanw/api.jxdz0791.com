<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pid')->default(0)->comment("父id");
            $table->string('name', 255)->default('')->comment("名称");
            $table->unsignedTinyInteger('level')->default(1)->comment('等级');
            $table->unsignedInteger('sort')->default(0)->comment('权重');
            $table->unsignedInteger('user_id')->default(1)->comment('添加人');
            $table->unsignedTinyInteger('status')->default(1)->comment("状态，0禁止1启用");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
