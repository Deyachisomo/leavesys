<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Supervisor extends Model
{
    protected $table = 'supervisors';
    protected $primaryKey = 'SupervisorID';

    protected $fillable = [
        'FirstName',
        'LastName',
        // Include additional fields if necessary
    ];
}
