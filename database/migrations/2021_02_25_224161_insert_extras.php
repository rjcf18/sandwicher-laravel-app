<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InsertExtras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('extras')->insert(
            [
                ['name' => 'Bacon'],
                ['name' => 'Meat'],
                ['name' => 'Cheese'],
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
