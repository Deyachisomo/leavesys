<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class LeaveRequest extends Model
{
    use HasFactory;

    protected $table = 'leave_requests';
    protected $primaryKey = 'LeaveRequestID';
    public $timestamps = true;

    protected $fillable = [
        'EmployeeNumber',
        'LeaveTypeID',
        'StartDate',
        'EndDate',
        'TotalDays',
        'RequestStatus',
        'SupervisorApproval',
        'HRApproval',
        'RejectionReason',
        'Reason',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmployeeNumber', 'EmployeeNumber');
    }

    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class, 'LeaveTypeID', 'LeaveTypeID');
    }
}
