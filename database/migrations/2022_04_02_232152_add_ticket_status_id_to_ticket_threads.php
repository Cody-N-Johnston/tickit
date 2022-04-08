<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_threads', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->foreignId('ticket_status_id')
                ->nullable()
                ->constrained('ticket_statuses')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_threads', function (Blueprint $table) {
            //
        });
    }
};
