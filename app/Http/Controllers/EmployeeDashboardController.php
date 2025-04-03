<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use App\Models\Grade;
use App\Models\Employee;

class EmployeeDashboardController extends Controller
{
    public function index()
    {
        $employee = auth()->user();

        // Ensure the authenticated user is valid and an employee
        if (!$employee || !$employee->GradeID) {
            \Log::error("Invalid Employee or missing GradeID for User ID: " . auth()->id());
            return redirect()->route('home')->withErrors(['error' => 'Unable to fetch your details. Please contact support.']);
        }

        // Fetch employee's grade details
        $grade = Grade::find($employee->GradeID);
        $gradeName = $grade->GradeName ?? 'N/A';
        $totalLeaveDays = $grade->AnnualLeaveDays ?? 0;

        // Fetch employee's leave requests
        $leaveRequests = LeaveRequest::where('EmployeeNumber', $employee->EmployeeNumber)
            ->with('leaveType')
            ->latest()
            ->get();
        $totalLeaveRequests = $leaveRequests->count();

        // Return dashboard view
        return view('employee.dashboard', compact('gradeName', 'totalLeaveDays', 'leaveRequests', 'totalLeaveRequests'));
    }
}
