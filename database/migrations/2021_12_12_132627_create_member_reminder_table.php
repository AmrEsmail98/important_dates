<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberReminderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_reminder', function (Blueprint $table) {
            $table->foreignId('member_id')->constrained()->onDelete('cascade');
            $table->foreignId('reminder_id')->constrained()->onDelete('cascade');
            $table->primary(['member_id', 'reminder_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_reminders');
    }
}
