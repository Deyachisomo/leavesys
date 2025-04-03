<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees'; // Define table name
    protected $primaryKey = 'EmployeeNumber'; // Define primary key
    public $incrementing = false; // Disable auto-increment if primary key is custom
    protected $keyType = 'string'; // Define primary key as a string
    public $timestamps = true; // Use Laravel's created_at and updated_at timestamps

    protected $fillable = [
        'EmployeeNumber',
        'FirstName',
        'LastName',
        'DateOfBirth',
        'DepartmentID',
        'Gender',
        'GradeID',
        'PositionID',
        'SupervisorID',
    ];

    /**
     * Relationships
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'DepartmentID', 'DepartmentID');
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'SupervisorID', 'EmployeeNumber');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'GradeID', 'GradeID');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'PositionID', 'PositionID');
    }

    public function supervisor()
    {
        return $this->belongsTo(Employee::class, 'SupervisorID', 'EmployeeNumber');
    }

    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class, 'EmployeeNumber', 'EmployeeNumber');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'EmployeeNumber', 'EmployeeNumber');
    }

    /**
     * Accessors
     */
    public function getLeaveDaysRemainingAttribute()
    {
        $totalLeaveDays = $this->grade->AnnualLeaveDays ?? 20; // Default to 20 days if no grade
        $usedLeaveDays = $this->leaveRequests()
            ->where('RequestStatus', 'Approved')
            ->sum('TotalDays');

        return $totalLeaveDays - $usedLeaveDays;
    }

    /**
     * Scopes
     */
    public function scopeByDepartment($query, $departmentId)
    {
        return $query->where('DepartmentID', $departmentId);
    }
}
