<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\GeneralEmployeeDashboardController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\Auth\LoginController;



use App\Models\Employee;

Route::get('/test-employee', function () {
    return Employee::all();
});



Route::resource('leave-types', LeaveTypeController::class);

// Dashboard Route
Route::get('/employee/dashboard', [EmployeeDashboardController::class, 'index'])->name('employee.dashboard');

Route::post('/leave-types', [LeaveTypeController::class, 'store'])->name('leave-types.store');

Route::get('/leave-requests', [LeaveRequestController::class, 'index'])->name('leave-requests.index');
Route::get('/leave-requests/create', [LeaveRequestController::class, 'create'])->name('leave-requests.create');
Route::post('/leave-requests', [LeaveRequestController::class, 'store'])->name('leave-requests.store');
Route::get('/leave-requests/my-requests', [LeaveRequestController::class, 'myLeaveRequests'])->name('leave-requests.my-requests');
Route::post('/leave-requests/{LeaveRequestID}/approve', [LeaveRequestController::class, 'approve'])->name('leave-requests.approve');
Route::post('/leave-requests/{LeaveRequestID}/reject', [LeaveRequestController::class, 'reject'])->name('leave-requests.reject');

Route::middleware(['web', 'auth', 'employee'])->group(function () {
    Route::get('/dashboard/employee', [EmployeeDashboardController::class, 'index'])->name('employee.dashboard');
});

// Authentication Routes
Auth::routes();

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Root Route
Route::get('/', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
});

Route::middleware(['auth', 'employee'])->group(function () {
    Route::get('/dashboard/employee', [EmployeeDashboardController::class, 'index'])->name('employee.dashboard');
    Route::get('/leaves/create', [LeaveRequestController::class, 'create'])->name('leaves.create'); // Ensure this route exists
});



// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Admin dashboard
});

// Employee routes
Route::middleware(['auth', 'employee'])->group(function () {
    Route::get('/dashboard/employee', [EmployeeDashboardController::class, 'index'])->name('employee.dashboard'); // Employee dashboard
    Route::get('/leaves/create', [LeaveRequestController::class, 'create'])->name('leaves.create');
});

// Admin Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Employees Management
Route::resource('employees', EmployeeController::class);

// Positions Management
Route::resource('positions', PositionController::class);

// Grades Management
Route::resource('grades', GradeController::class);

// Departments Management
Route::resource('departments', DepartmentController::class);
Route::get('/departments/{id}/employees', [DepartmentController::class, 'getEmployeesByDepartment'])->name('departments.employees');

// Leave Types Management
Route::resource('leave_types', LeaveTypeController::class)->middleware('auth');

// Leave Requests Management
Route::middleware('auth')->group(function () {
    Route::get('/leave-requests', [LeaveRequestController::class, 'index'])->name('leave.requests.index');
    Route::resource('leave-requests', LeaveRequestController::class)->except(['index']);
    Route::get('/leave-request/create', [LeaveRequestController::class, 'create'])->name('leaves.create');
    Route::post('/leave-request', [LeaveRequestController::class, 'store'])->name('leaves.store');
    Route::get('/my-leave-requests', [LeaveRequestController::class, 'myLeaveRequests'])->name('leaves.my-requests');
    Route::get('/calculate-leave-days', [LeaveRequestController::class, 'calculateRemainingLeaveDays'])->name('leaves.calculate-days');
    Route::post('/leave-requests/{LeaveRequestID}/approve', [LeaveRequestController::class, 'approve'])->name('hr.approve');
    Route::post('/leave-requests/{LeaveRequestID}/reject', [LeaveRequestController::class, 'reject'])->name('hr.reject');
});

// Notifications Management
Route::middleware('auth')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');
    Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
});

// Profile Management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

// Supervisor Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/supervisor/dashboard', [SupervisorController::class, 'index'])->name('supervisor.dashboard');
    Route::post('/supervisor/approve/{id}', [SupervisorController::class, 'approve'])->name('supervisor.approve');
    Route::post('/supervisor/reject/{id}', [SupervisorController::class, 'reject'])->name('supervisor.reject');
});

// Employee Dashboards
Route::middleware(['auth', 'employee'])->group(function () {
    Route::get('/dashboard/employee', [EmployeeDashboardController::class, 'index'])->name('employee.dashboard');
    Route::get('/dashboard/general', [GeneralEmployeeDashboardController::class, 'index'])->name('general.dashboard');
});

Route::get('/employee', 'Employee@index');


// Registration Thank You Page
Route::get('/register/thankyou', function () {
    return view('auth.thankyou');
})->name('register.thankyou');
