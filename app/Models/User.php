<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Controllers\DepartmentController;
use App\Models\Employee;
class User extends Authenticatable
{
    // Define the primary key and its attributes
    protected $primaryKey = 'EmployeeNumber'; // Set EmployeeNumber as the primary key
    protected $keyType = 'string'; // EmployeeNumber is a string
    public $incrementing = false; // It is not auto-incrementing

    // Define mass-assignable attributes
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'EmployeeNumber', // Ensure EmployeeNumber is fillable
    ];

    // Hide sensitive attributes from JSON serialization
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * Relationship with Employee.
     * Each user corresponds to an employee in the Employee table.
     */
    public function employee()
    {
        return $this->hasOne(Employee::class, 'EmployeeNumber', 'EmployeeNumber');
    }
}
