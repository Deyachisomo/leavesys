

<?php $__env->startSection('title', 'Manage Employees'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Manage Employees</h2>

    <!-- Add New Employee Button -->
    <div class="d-flex justify-content-end mb-4">
        <a href="<?php echo e(route('employees.create')); ?>" class="btn btn-success">Add New Employee</a>
    </div>

    <!-- Employees Table -->
    <?php if($employees->isNotEmpty()): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Employee Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Grade</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($employee->EmployeeNumber); ?></td>
                            <td><?php echo e($employee->FirstName); ?></td>
                            <td><?php echo e($employee->LastName); ?></td>
                            <td><?php echo e($employee->Gender); ?></td>
                            <td><?php echo e($employee->department->DepartmentName ?? 'N/A'); ?></td>
                            <td><?php echo e($employee->grade->GradeName ?? 'N/A'); ?></td>
                            <td><?php echo e($employee->position->PositionName ?? 'N/A'); ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Edit Button -->
                                    <a href="<?php echo e(route('employees.edit', $employee->EmployeeNumber)); ?>" class="btn btn-warning btn-sm">Edit</a>

                                    <!-- Delete Form -->
                                    <form action="<?php echo e(route('employees.destroy', $employee->EmployeeNumber)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            No employees found. Click the "Add New Employee" button above to add one.
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DEYA\Desktop\leavedb\leavesysdb\resources\views/employees/index.blade.php ENDPATH**/ ?>