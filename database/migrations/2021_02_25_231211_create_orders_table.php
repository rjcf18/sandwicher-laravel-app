<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'orders_user_foreign')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id', 'orders_meal_foreign')
                ->references('id')
                ->on('meals')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('bread_type_id');
            $table->foreign('bread_type_id', 'orders_bread_type_foreign')
                ->references('id')
                ->on('bread_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('bread_size_id');
            $table->foreign('bread_size_id', 'orders_bread_size_foreign')
                ->references('id')
                ->on('bread_sizes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('taste_id');
            $table->foreign('taste_id', 'orders_taste_foreign')
                ->references('id')
                ->on('tastes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('extra_id');
            $table->foreign('extra_id', 'orders_extra_foreign')
                ->references('id')
                ->on('extras')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('vegetable_id');
            $table->foreign('vegetable_id', 'orders_vegetables_foreign')
                ->references('id')
                ->on('vegetables')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('sauce_id');
            $table->foreign('sauce_id', 'orders_sauce_foreign')
                ->references('id')
                ->on('sauces')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->boolean('oven_baked');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
