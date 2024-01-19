<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('travel_expenses', function (Blueprint $table) {
            $table->id('expense_id'); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for user
            $table->char('tr_track_no', 20); // Foreign key for travel request (assuming 'tr_track_no' is the ID)
            $table->decimal('transportation', 10, 2); // Money column for transportation
            $table->decimal('accommodation', 10, 2); // Money column for accommodation
            $table->decimal('meal', 10, 2); // Money column for meal
            $table->decimal('other_expenses_amount', 10, 2); // Money column for other expenses
            $table->string('other_expenses'); // String column for other expenses details
            $table->binary('attachments');
            $table->date('date'); // Date column
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tr_track_no')->references('tr_track_no')->on('travel_requests');
            // $table->id();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_expenses');
    }
};
