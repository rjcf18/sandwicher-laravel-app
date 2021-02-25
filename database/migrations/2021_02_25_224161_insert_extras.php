<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertExtras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = new DateTimeImmutable();

        DB::table('extras')->insert(
            [
                ['name' => 'Bacon', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Meat', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Cheese', 'created_at' => $now, 'updated_at' => $now],
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
        DB::table('extras')
            ->whereIn('name', ['Bacon', 'Meat', 'Cheese'])->delete();
    }
}
