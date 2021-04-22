<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVotesToAdminUsersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_users_info', function (Blueprint $table) {
            //
            $table->string("name", 32)->default('')->comment("姓名")->after("job_number");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_users_info', function (Blueprint $table) {
            $table->dropColumn(['name']);

        });
    }
}
