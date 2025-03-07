<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('leave_types', function (Blueprint $table) {
            $table->id('LeaveTypeID'); // Primary Key
            $table->string('LeaveTypeName', 150); // Adding max length for consistency
            $table->boolean('IsPaidLeave'); // Boolean works here
            $table->enum('GenderApplicable', ['Male', 'Female', 'Both']);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_types');
    }
};
