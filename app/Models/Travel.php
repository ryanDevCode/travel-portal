<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;
    protected $table = 'g59_travel_budget_requests';
    protected $fillable = [
        'RequestID',
        'UserID',
        'Title',
        'Travel',
        'Department',
        'StartDate',
        'EndDate',
        'Destinations',
        'PurposeOfTravel',
        'NumberOfTravelers',
        'ModeOfTransportation',
        'TransportationCost',
        'TypeOfAccommodation',
        'AccommodationCost',
        'DailyAllowance',
        'ConferenceRegistrationFee',
        'VisaDocumentationFee',
        'TravelInsuranceCost',
        'MiscellaneousExpenses',
        'Remarks',
        'TotalEstimatedBudget',
        'Justification',
        'ExpectedOutcomes',
        'TravelPolicyCompliance',
        'AlternativeOptionsConsidered',
        'FoodCost',
        'DateSubmitted',
        'Status',
        'DateApproved',
        'ApprovedBy',
        'ExpenseApproval',
        'Attachments',
        'AttachmentsPath',
        'QuotesEstimates',
        'QuotesEstimatesPath'
    ];

    public function user()
    {
        return $this->belongsTo(User::class); // Specify the foreign key
    }

    public function travelExpense()
    {
        return $this->hasMany(TravelExpense::class);
    }
}
