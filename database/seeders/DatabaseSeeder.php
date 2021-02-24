<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Sandwicher\Application\Models\User as UserModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        UserModel::factory(10)->create();
    }
}
