

<?php $__env->startSection('title', 'Add New Department'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h2">Add New Department</h1>
        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-sm btn-primary">Back to Dashboard</a>
    </div>

    <div class="row">
        <!-- Form Section -->
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    Create Department
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('departments.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <!-- Department Name -->
                        <div class="form-group mb-3">
                            <label for="DepartmentName" class="form-label">Department Name</label>
                            <input type="text" name="DepartmentName" id="DepartmentName" 
                                   class="form-control <?php $__errorArgs = ['DepartmentName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                   value="<?php echo e(old('DepartmentName')); ?>" required placeholder="Enter department name">
                            <?php $__errorArgs = ['DepartmentName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Supervisor Dropdown -->
                        <div class="form-group mb-3">
                            <label for="SupervisorID" class="form-label">Supervisor</label>
                            <select name="SupervisorID" id="SupervisorID" 
                                    class="form-select <?php $__errorArgs = ['SupervisorID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                <option value="" selected>Select Supervisor (Optional)</option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($employee->EmployeeNumber); ?>" 
                                            <?php echo e(old('SupervisorID') == $employee->EmployeeNumber ? 'selected' : ''); ?>>
                                        <?php echo e($employee->FirstName); ?> <?php echo e($employee->LastName); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['SupervisorID'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success">Create Department</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Sidebar Section -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white">
                    Quick Links
                </div>
                <div class="card-body">
                    <a href="<?php echo e(route('departments.index')); ?>" class="btn btn-info btn-block mb-2">View All Departments</a>
                    <a href="<?php echo e(route('employees.index')); ?>" class="btn btn-warning btn-block mb-2">Manage Employees</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DEYA\Desktop\leavedb\leavesysdb\resources\views/departments/create.blade.php ENDPATH**/ ?>