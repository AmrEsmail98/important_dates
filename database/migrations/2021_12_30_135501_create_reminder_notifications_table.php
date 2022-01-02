<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReminderNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminder_notifications', function (Blueprint $table) {
            $table->id();
            //Notifications Time =>  e.g (1 day before)
           $table->unsignedInteger('number_of_dayes_before');
           $table->foreignId('reminder_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('reminder_notifications');
    }
}
