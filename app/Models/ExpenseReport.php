<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    use HasFactory;
    protected $table = 'expense_report';
    protected $primaryKey = 'expense_report_id';
    // $expenseReport->expense_tracks = $expenses->tr_track_no;
    // $expenseReport->total_transportation = $expenses->total_transportation;
    // $expenseReport->total_accommodation = $expenses->total_accommodation;
    // $expenseReport->total_meal = $expenses->total_meal;
    // $expenseReport->total_other_expenses = $expenses->total_other_expenses;
    // $expenseReport->total_other_expenses = $expenses->total;
    protected $fillable = [
        'total_transportation', 'total_accommodation', 'total_meal', 'total_other_expenses', 'total'
    ];
}
