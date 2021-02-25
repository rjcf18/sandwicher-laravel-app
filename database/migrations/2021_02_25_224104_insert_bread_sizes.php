<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertBreadSizes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('bread_sizes')->insert(
            [
                ['name' => '15cm'],
                ['name' => '30cm'],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('bread_sizes')
            ->whereIn('name', ['15cm', '30cm'])->delete();
    }
}
