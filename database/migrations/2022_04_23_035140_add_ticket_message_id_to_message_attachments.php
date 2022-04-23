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
        Schema::table('ticket_message_attachments', function (Blueprint $table) {
            $table->foreignId('ticket_message_id')
                ->nullable()
                ->constrained('ticket_messages')
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
        Schema::table('ticket_message_attachments', function (Blueprint $table) {
            $table->dropConstrainedForeignId('ticket_message_id');
        });
    }
};
