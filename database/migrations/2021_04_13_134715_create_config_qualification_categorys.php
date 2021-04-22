<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigQualificationCategorys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_qualification_categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("pid")->default(0)->comment("父级ID");
            $table->string("title",50)->default('')->comment("类别名称");
            $table->tinyInteger("sort")->unsigned()->default(0)->comment("排序");
            $table->tinyInteger("status")->unsigned()->default(1)->comment("是否启用(1.启动 2.禁用)");
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `config_qualification_categorys` comment '企业资质配置表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_qualification_categorys');
    }
}
