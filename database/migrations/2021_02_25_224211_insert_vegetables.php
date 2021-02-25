<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertVegetables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('vegetables')->insert(
            [
                ['name' => 'Green Peppers'],
                ['name' => 'Lettuce'],
                ['name' => 'Cucumber'],
                ['name' => 'Tomatoes'],
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
        DB::table('vegetables')
            ->whereIn('name', ['Green Peppers', 'Lettuce', 'Cucumber', 'Tomatoes'])->delete();
    }
}
