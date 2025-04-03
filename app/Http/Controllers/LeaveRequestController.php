<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use App\Models\Notification;
use App\Models\Employee;
use Carbon\Carbon;

class LeaveRequestController extends Controller
{
    /**
     * Display all leave requests for HR or supervisors.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $leaveRequests = LeaveRequest::with(['employee', 'leaveType'])->orderBy('created_at', 'desc')->get();
        return view('leave_requests.index', compact('leaveRequests'));
    }

    /**
     * Approve a leave request.
     *
     * @param int $LeaveRequestID
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($LeaveRequestID)
    {
        $leaveRequest = LeaveRequest::findOrFail($LeaveRequestID);
        $leaveRequest->update([
            'SupervisorApproval' => true,
            'RequestStatus' => 'Approved',
        ]);

        Notification::create([
            'EmployeeNumber' => $leaveRequest->EmployeeNumber,
            'Message' => 'Your leave request has been approved.',
            'Status' => 'Unread',
        ]);

        return redirect()->back()->with('success', 'Leave request approved successfully!');
    }

    /**
     * Reject a leave request.
     *
     * @param int $LeaveRequestID
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reject(Request $request, $LeaveRequestID)
    {
        $leaveRequest = LeaveRequest::findOrFail($LeaveRequestID);
        $request->validate([
            'Reason' => 'required|string|max:255',
        ]);

        $leaveRequest->update([
            'RequestStatus' => 'Rejected',
            'RejectionReason' => $request->Reason,
        ]);

        Notification::create([
            'EmployeeNumber' => $leaveRequest->EmployeeNumber,
            'Message' => 'Your leave request has been rejected. Reason: ' . $request->Reason,
            'Status' => 'Unread',
        ]);

        return redirect()->back()->with('success', 'Leave request rejected successfully!');
    }

    /**
     * Create a new leave request form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $leaveTypes = LeaveType::all();
        return view('leave_requests.create', compact('leaveTypes'));
    }

    /**
     * Store a new leave request in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'LeaveTypeID' => 'required|exists:leave_types,LeaveTypeID',
            'StartDate' => 'required|date|after_or_equal:today',
            'EndDate' => 'required|date|after_or_equal:StartDate',
            'Reason' => 'required|string|max:1000',
        ]);

        $employee = auth()->user(); // Replace with actual authenticated employee
        $totalDays = Carbon::parse($request->EndDate)->diffInDays(Carbon::parse($request->StartDate)) + 1;

        LeaveRequest::create([
            'EmployeeNumber' => $employee->EmployeeNumber,
            'LeaveTypeID' => $request->LeaveTypeID,
            'StartDate' => $request->StartDate,
            'EndDate' => $request->EndDate,
            'TotalDays' => $totalDays,
            'RequestStatus' => 'Pending',
            'SupervisorApproval' => false,
            'HRApproval' => false,
            'Reason' => $request->Reason,
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'Leave request submitted successfully!');
    }

    /**
     * Display leave requests for the logged-in employee.
     *
     * @return \Illuminate\View\View
     */
    public function myLeaveRequests()
    {
        $employee = auth()->user(); // Replace with actual authenticated employee
        $leaveRequests = LeaveRequest::where('EmployeeNumber', $employee->EmployeeNumber)->with('leaveType')->orderBy('created_at', 'desc')->get();
        return view('leave_requests.my_requests', compact('leaveRequests'));
    }

    /**
     * Calculate remaining leave days for the logged-in employee.
     *
     * @return int
     */
    public function calculateRemainingLeaveDays()
    {
        $employee = auth()->user(); // Replace with actual authenticated employee
        $totalLeaveDays = $employee->grade->AnnualLeaveDays ?? 0;
        $usedLeaveDays = LeaveRequest::where('EmployeeNumber', $employee->EmployeeNumber)->where('RequestStatus', 'Approved')->sum('TotalDays');
        return $totalLeaveDays - $usedLeaveDays;
    }
}
