<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelExpense extends Model
{
    use HasFactory;
    protected $table = 'g59_travel_expense_reports';
    protected $fillable = [
        'ReportID',
        'RequestID',
        'UserID',
        'TravelerName',
        'Date',
        'Remarks',
        'ModeOfTransportation',
        'TransportationCost',
        'TypeOfAccommodation',
        'AccommodationCost',
        'DailyAllowance',
        'MealsAndIncidentals',
        'ConferenceRegistrationFee',
        'VisaDocumentationFee',
        'TravelInsuranceCost',
        'MiscellaneousExpenses',
        'TotalExpenses',
        'ExpenseApproval',
        'SubmittedDate',
        'Status',
        'ApprovedDate', //Approved by admin
        'ApprovedBy' //Approved by current admin logged in
    ];


    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
