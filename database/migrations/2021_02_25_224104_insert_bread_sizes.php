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
        $now = new DateTimeImmutable();

        DB::table('bread_sizes')->insert(
            [
                ['name' => '15cm', 'created_at' => $now, 'updated_at' => $now],
                ['name' => '30cm', 'created_at' => $now, 'updated_at' => $now],
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
