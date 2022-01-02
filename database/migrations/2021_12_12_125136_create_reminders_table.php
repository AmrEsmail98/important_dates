<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('notes')->nullable();
            $table->date('start_date');

            //keeping track of reapeates if exists
            $table->boolean('repeated');
            $table->unsignedSmallInteger('repeating_type')->nullable(); // 0 => weekly , 1 => monthly, 2 => yearly
            $table->unsignedInteger('repeating_number')->nullable(); //every 2 'number' weeks 'type'
            $table->date('end_date')->nullable();

            $table->boolean('active')->default(true);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('color_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('reminders');
    }
}
