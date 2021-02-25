<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertVegetables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = new DateTimeImmutable();

        DB::table('vegetables')->insert(
            [
                ['name' => 'Green Peppers', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Lettuce', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Cucumber', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Tomatoes', 'created_at' => $now, 'updated_at' => $now],
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
