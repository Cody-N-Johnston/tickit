<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_statuses')->insert([
            [
                'status' => "To Do",
                'description' => "Default status. Tickets with this status are pending review. Please wait patiently for a team member's response."
            ],
            [
                'status' => "Doing",
                'description' => "Ticket has been received by a team member and is actively being worked on."
            ],
            [
                'status' => "Done",
                'description' => "Ticket has been resolved by a team member."
            ]
        ]);
    }
}
