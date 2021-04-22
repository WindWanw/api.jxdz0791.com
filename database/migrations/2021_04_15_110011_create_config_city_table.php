<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigCityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_city', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pid')->default(0)->comment("父ID");
            $table->string("name",64)->default("")->comment("名字");
            $table->tinyInteger("level")->default(1);
            $table->tinyInteger("sort")->default(1);

        });
        DB::statement("ALTER TABLE `config_city` comment '城市表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_city');
    }
}
