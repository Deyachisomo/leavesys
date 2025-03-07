<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('EmployeeID'); // Primary Key
            $table->string('FirstName', 100); // Adding max length for consistency
            $table->string('LastName', 100);
            $table->enum('Gender', ['Male', 'Female', 'Other']);
            $table->date('DateOfBirth');
            $table->unsignedBigInteger('DepartmentID'); // Foreign Key to Departments
            $table->unsignedBigInteger('GradeID'); // Foreign Key to Grades
            $table->unsignedBigInteger('PositionID'); // Foreign Key to Positions
            $table->unsignedBigInteger('SupervisorID')->nullable(); // Self-referencing Foreign Key
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments')->onDelete('cascade');
            $table->foreign('GradeID')->references('GradeID')->on('grades')->onDelete('cascade');
            $table->foreign('PositionID')->references('PositionID')->on('positions')->onDelete('cascade');
            $table->foreign('SupervisorID')->references('EmployeeID')->on('employees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees'); // Drops the table when rolling back
    }
};

