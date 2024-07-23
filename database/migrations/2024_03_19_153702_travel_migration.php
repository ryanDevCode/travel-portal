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
        Schema::create('g59_travel_budget_requests', function (Blueprint $table) {
            $table->id();
            $table->string('RequestID', 50)->unique()->default('0');
            $table->unsignedBigInteger('UserID');
            $table->string('Title', 50)->notNullable()->default('0');
            $table->string('Department', 100)->notNullable();
            $table->string('StartDate', 50)->notNullable()->default('');
            $table->string('EndDate', 50)->notNullable()->default('');
            $table->text('Destinations')->nullable();
            $table->text('PurposeOfTravel')->nullable();
            $table->integer('NumberOfTravelers')->nullable();
            $table->string('ModeOfTransportation', 100)->nullable();
            $table->decimal('TransportationCost', 15, 2)->nullable();
            $table->string('TypeOfAccommodation', 100)->nullable();
            $table->decimal('AccommodationCost', 15, 2)->nullable();
            $table->decimal('DailyAllowance', 15, 2)->nullable();
            $table->decimal('ConferenceRegistrationFee', 15, 2)->nullable();
            $table->decimal('VisaDocumentationFee', 15, 2)->nullable();
            $table->decimal('TravelInsuranceCost', 15, 2)->nullable();
            $table->decimal('MiscellaneousExpenses', 15, 2)->nullable();
            $table->decimal('TotalEstimatedBudget', 15, 2)->nullable();
            $table->text('Justification')->nullable();
            $table->text('ExpectedOutcomes')->nullable();
            $table->string('TravelPolicyCompliance', 50)->nullable();
            $table->text('AlternativeOptionsConsidered')->nullable();
            $table->text('Itinerary')->nullable();
            $table->text('QuotesEstimates')->nullable();
            $table->string('Attachments', 250)->nullable();
            $table->date('DateSubmitted')->nullable();
            $table->string('Status', 20)->nullable()->default('Pending');
            $table->date('DateApproved')->nullable();
            $table->string('ApprovedBy', 100)->nullable();
            $table->timestamps();

            // Foreign key constraint (referential integrity)
            $table->foreign('UserID')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('g59_travel_budget_requests');
    }
};
