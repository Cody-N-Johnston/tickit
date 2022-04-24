<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->run(GroupSeeder::class);
        $this->run(UserSeeder::class);
        $this->run(TicketStatusSeeder::class);
    }
}
