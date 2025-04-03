<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Grade;
use App\Models\Position;
use App\Models\LeaveType;

class EmployeeController extends Controller
{
    /**
     * Display a listing of employees.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $employees = Employee::with(['department', 'grade', 'position'])
            ->orderBy('FirstName', 'asc')
            ->get();

        $departments = Department::all();
        $grades = Grade::all();
        $positions = Position::all();
        $leaveTypes = LeaveType::all();

        return view('employees.index', compact('employees', 'departments', 'grades', 'positions', 'leaveTypes'));
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $departments = Department::all();
        $grades = Grade::all();
        $positions = Position::all();
        $leaveTypes = LeaveType::all();

        return view('employees.create', compact('departments', 'grades', 'positions', 'leaveTypes'));
    }

    /**
     * Store a newly created employee in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'EmployeeNumber' => 'required|unique:employees,EmployeeNumber',
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'DateOfBirth' => 'required|date',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'GradeID' => 'required|exists:grades,GradeID',
            'PositionID' => 'required|exists:positions,PositionID',
            'Gender' => 'required|in:Male,Female,Other', // Correctly validating gender field
        ]);

        // Debugging validation result for Gender if needed:
        // dd($validatedData['Gender']);

        Employee::create($validatedData);

        session()->flash('success', 'Employee has been successfully added!');
        return redirect()->route('employees.index');
    }

    /**
     * Show the form for editing an existing employee.
     *
     * @param string $EmployeeNumber
     * @return \Illuminate\View\View
     */
    public function edit($EmployeeNumber)
    {
        $employee = Employee::where('EmployeeNumber', $EmployeeNumber)->firstOrFail();
        $departments = Department::all();
        $grades = Grade::all();
        $positions = Position::all();

        return view('employees.edit', compact('employee', 'departments', 'grades', 'positions'));
    }

    /**
     * Update an employee's information in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $EmployeeNumber
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $EmployeeNumber)
    {
        
        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'DateOfBirth' => 'required|date',
            'DepartmentID' => 'required|exists:departments,DepartmentID',
            'GradeID' => 'required|exists:grades,GradeID',
            'PositionID' => 'required|exists:positions,PositionID',
            'Gender' => 'required|in:Male,Female,Other', // Correctly validating gender field
        ]);

        // Debugging validation result for Gender if needed:
        // dd($validatedData['Gender']);

        $employee = Employee::where('EmployeeNumber', $EmployeeNumber)->firstOrFail();
        $employee->update($validatedData);

        session()->flash('success', 'Employee details have been successfully updated!');
        return redirect()->route('employees.index');
    }

    /**
     * Remove an employee from the database.
     *
     * @param string $EmployeeNumber
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($EmployeeNumber)
    {
        $employee = Employee::where('EmployeeNumber', $EmployeeNumber)->firstOrFail();
        $employee->delete();

        session()->flash('success', 'Employee ' . $employee->FirstName . ' ' . $employee->LastName . ' has been successfully deleted!');
        return redirect()->route('employees.index');
    }

    /**
     * Fetch employees by department for filtering (e.g., supervisors).
     *
     * @param string $DepartmentID
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEmployeesByDepartment($DepartmentID)
    {
        $employees = Employee::where('DepartmentID', $DepartmentID)->get(['EmployeeNumber', 'FirstName', 'LastName']);
        return response()->json($employees);
    }
}
