<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserList;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        UserList::factory(20)->create();
    }
}
