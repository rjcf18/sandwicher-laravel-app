<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertSauces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('sauces')->insert(
            [
                ['name' => 'Mayonnaise'],
                ['name' => 'Mustard'],
                ['name' => 'Barbecue'],
                ['name' => 'Honey Mustard'],
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
        DB::table('sauces')
            ->whereIn('name', ['Mayonnaise', 'Mustard', 'Barbecue', 'Honey Mustard'])->delete();
    }
}
