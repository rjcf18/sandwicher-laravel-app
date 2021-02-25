<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertSauces extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = new DateTimeImmutable();

        DB::table('sauces')->insert(
            [
                ['name' => 'Mayonnaise', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Mustard', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Barbecue', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Honey Mustard', 'created_at' => $now, 'updated_at' => $now],
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
