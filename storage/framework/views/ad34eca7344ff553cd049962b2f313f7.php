

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Management</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="<?php echo e(route('employees.index')); ?>" class="btn btn-link w-100">Manage Employees</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('departments.index')); ?>" class="btn btn-link w-100">Manage Departments</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('leave_types.index')); ?>" class="btn btn-link w-100">Manage Leave Types</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('positions.index')); ?>" class="btn btn-link w-100">Manage Positions</a></li>
                        <li class="list-group-item"><a href="<?php echo e(route('grades.index')); ?>" class="btn btn-link w-100">Manage Grades</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <!-- Overview Cards -->
            <div class="row text-center">
                <!-- Total Employees -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Employees</h5>
                            <p><?php echo e($totalEmployees); ?></p>
                        </div>
                    </div>
                </div>
                <!-- Male Employees -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Male Employees</h5>
                            <p><?php echo e($maleEmployees); ?></p>
                        </div>
                    </div>
                </div>
                <!-- Female Employees -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Female Employees</h5>
                            <p><?php echo e($femaleEmployees); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- More Overview Cards -->
            <div class="row text-center">
                <!-- Total Positions -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Positions</h5>
                            <p><?php echo e($totalPositions); ?></p>
                        </div>
                    </div>
                </div>
                <!-- Total Grades -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Grades</h5>
                            <p><?php echo e($totalGrades); ?></p>
                        </div>
                    </div>
                </div>
                <!-- Total Departments -->
                <div class="col-md-4 mb-4">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5>Total Departments</h5>
                            <p><?php echo e($departments->count()); ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Department Overview -->
            <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h5>Department Overview</h5>
            </div>
            <div class="card-body">
                <?php if($departments->isNotEmpty()): ?>
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>#</th>
                                <th>Department Name</th>
                                <th>Number of Employees</th>
                                <th>Supervisor</th> <!-- New Supervisor Column -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($department->DepartmentName); ?></td>
                                    <td><?php echo e($department->employees_count); ?></td>
                                    <td><?php echo e($department->supervisor ? $department->supervisor->FirstName . ' ' . $department->supervisor->LastName : 'N/A'); ?></td> <!-- Supervisor Name -->
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info text-center">No departments found.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

            <!-- Recent Leave Requests -->
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            <h5>Recent Leave Requests</h5>
                        </div>
                        <div class="card-body">
                            <?php if($recentLeaveRequests->isNotEmpty()): ?>
                                <table class="table table-bordered table-striped">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Employee Name</th>
                                            <th>Leave Type</th>
                                            <th>Status</th>
                                            <th>Requested On</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $recentLeaveRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($request->employee->FirstName); ?> <?php echo e($request->employee->LastName); ?></td>
                                                <td><?php echo e($request->leaveType->LeaveTypeName); ?></td>
                                                <td><?php echo e(ucfirst($request->Status)); ?></td>
                                                <td><?php echo e($request->created_at->format('d-m-Y')); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="alert alert-info text-center">No recent leave requests found.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DEYA\Desktop\leavedb\leavesysdb\resources\views/dashboard/index.blade.php ENDPATH**/ ?>