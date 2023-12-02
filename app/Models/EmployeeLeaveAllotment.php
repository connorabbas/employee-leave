<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeLeaveAllotment extends Model
{
    use HasFactory;

    protected $table = 'employee_leave_allotments';
    protected $fillable = [
        'user_id', 
        'leave_type_id', 
        'allotted_hours', 
        'used_hours'
    ];

    /**
     * Get the user that owns the leave allotment.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the leave type associated with the allotment.
     */
    public function leaveType(): BelongsTo
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }
}
