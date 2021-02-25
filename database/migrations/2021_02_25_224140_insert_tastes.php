<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertTastes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = new DateTimeImmutable();

        DB::table('tastes')->insert(
            [
                ['name' => 'Chicken Fajita', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Paprika', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Monterey Cheddar', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Honey Mustard & Chicken', 'created_at' => $now, 'updated_at' => $now],
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
