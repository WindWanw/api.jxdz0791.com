<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigQualificationCategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * php artisan db:seed --class=ConfigQualificationCategorysTableSeeder
     * @return void
     */
    public function run()
    {
        //
        DB::unprepared(file_get_contents(__DIR__."/qualification_categorys.sql"));
    }
}
