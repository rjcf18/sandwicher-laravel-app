<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertTastes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('tastes')->insert(
            [
                ['name' => 'Chicken Fajita'],
                ['name' => 'Paprika'],
                ['name' => 'Monterey Cheddar'],
                ['name' => 'Honey Mustard & Chicken'],
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
        DB::table('tastes')
            ->whereIn('name', ['Chicken Fajita', 'Paprika', 'Monterey Cheddar', 'Honey Mustard & Chicken'])->delete();
    }
}
