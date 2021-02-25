<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBreadTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bread_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

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
        Schema::dropIfExists('bread_types');
    }
}
