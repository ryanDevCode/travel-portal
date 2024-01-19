<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelRequest extends Model
{
    use HasFactory;
    protected $table = 'travel_requests';
    protected $primaryKey = 'travel_request_id';
    protected $fillable = [
        'destination', 'project_title', 'start_date', 'end_date', 'purpose', 'estimated_amount', 'attachment', 'tr_track_no', 'status', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Specify the foreign key
    }
    public function expenseTracks()
    {
        return $this->hasMany(ExpenseTrack::class, 'tr_track_no'); // Adjust foreign key if needed
    }

}
