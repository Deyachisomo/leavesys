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
        Schema::create('departments', function (Blueprint $table) {
            $table->id('DepartmentID'); // Primary Key
            $table->string('DepartmentName', 150); // Adding max length for consistency
            $table->unsignedBigInteger('HeadOfDepartmentID')->nullable(); // Foreign Key to Employees
            $table->foreign('HeadOfDepartmentID')->references('EmployeeID')->on('employees')->onDelete('set null');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
