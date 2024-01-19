<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseTrack extends Model
{
    use HasFactory;
    protected $table = 'travel_expenses';
    protected $primaryKey = 'expense_id';
    protected $fillable = [
        'tr_track_no', 'transportation', 'accomodation', 'meal', 'other_expenses_amount', 'other_expenses', 'date', 'user_id' , 'accommodation', 'attachments',
    ];
    public function travelRequests()
    {
        return $this->belongsTo(TravelRequest::class);
    }
    public function expenseTracks()
    {
        return $this->hasMany(ExpenseTrack::class);
    }
}
