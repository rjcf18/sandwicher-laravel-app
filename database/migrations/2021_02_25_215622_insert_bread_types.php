<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertBreadTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = new DateTimeImmutable();

        DB::table('bread_types')->insert(
            [
                ['name' => '9-Grain Wheat', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Flatbread', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Multi-grain Flatbread', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Italian', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Italian Herbs & Cheese', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Gluten-Free Bread', 'created_at' => $now, 'updated_at' => $now],
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
