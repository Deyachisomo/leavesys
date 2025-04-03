

<?php $__env->startSection('title', 'Departments'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="mb-4">Departments</h2>

    <!-- Flash Messages -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Add Department Button -->
    <div class="mb-4">
    <a href="<?php echo e(route('departments.create')); ?>" class="btn btn-success">Add New Department</a>


    </div>

    <!-- Departments Table -->
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Department Name</th>
                <th>Supervisor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($department->DepartmentName); ?></td>
                    <td>
                        <?php if($department->SupervisorID): ?>
                            <?php echo e($department->supervisor->FirstName ?? 'N/A'); ?> <?php echo e($department->supervisor->LastName ?? ''); ?>

                        <?php else: ?>
                            Not Assigned
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(route('departments.edit', $department->DepartmentID)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('departments.destroy', $department->DepartmentID)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this department?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center">No departments found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DEYA\Desktop\leavedb\leavesysdb\resources\views/departments/index.blade.php ENDPATH**/ ?>