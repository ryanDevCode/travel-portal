<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('g59_travel_expense_reports', function (Blueprint $table) {
            $table->increments('ReportID'); // Auto-incrementing primary key
            $table->string('RequestID', 50)->nullable()->collation('utf8mb4_0900_ai_ci');
            $table->unsignedBigInteger('UserID')->nullable(); // Assuming UserID reference
            $table->string('TravelerName', 100)->notNullable()->collation('utf8mb4_0900_ai_ci');
            $table->string('Department', 100)->notNullable()->collation('utf8mb4_0900_ai_ci');
            $table->string('Date', 100)->notNullable()->collation('utf8mb4_0900_ai_ci');
            $table->text('Destination')->nullable()->collation('utf8mb4_0900_ai_ci');
            $table->text('PurposeOfTravel')->nullable()->collation('utf8mb4_0900_ai_ci');
            $table->string('ModeOfTransportation', 100)->nullable()->collation('utf8mb4_0900_ai_ci');
            $table->decimal('TransportationCost', 15, 2)->nullable();
            $table->decimal('AccommodationCost', 15, 2)->nullable();
            $table->decimal('MealsAndIncidentals', 15, 2)->nullable();
            $table->decimal('ConferenceRegistrationFee', 15, 2)->nullable();
            $table->decimal('VisaDocumentationFee', 15, 2)->nullable();
            $table->decimal('TravelInsuranceCost', 15, 2)->nullable();
            $table->decimal('MiscellaneousExpenses', 15, 2)->nullable();
            $table->decimal('TotalExpenses', 15, 2)->nullable();
            $table->date('SubmittedDate')->nullable();
            $table->string('Status', 20)->nullable()->default('Pending')->collation('utf8mb4_0900_ai_ci');
            $table->date('ApprovedDate')->nullable();
            $table->string('ApprovedBy', 100)->nullable()->collation('utf8mb4_0900_ai_ci');

            $table->timestamps();

            // Foreign key constraint (referential integrity)
            $table->foreign('RequestID')
                ->references('RequestID')
                ->on('g59_travel_budget_requests')
                ->onDelete('NO ACTION')
                ->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('g59_travel_expense_reports');
    }
};
