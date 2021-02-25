<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertBreadTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('bread_types')->insert(
            [
                ['name' => '9-Grain Wheat'],
                ['name' => 'Flatbread'],
                ['name' => 'Multi-grain Flatbread'],
                ['name' => 'Italian'],
                ['name' => 'Italian Herbs & Cheese'],
                ['name' => 'Gluten-Free Bread'],
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
        DB::table('bread_types')
            ->whereIn(
                'name',
                ['9-Grain Wheat', 'Flatbread', 'Multi-grain Flatbread', 'Italian', 'Italian Herbs & Cheese', 'Gluten-Free Bread']
            )->delete();
    }
}
