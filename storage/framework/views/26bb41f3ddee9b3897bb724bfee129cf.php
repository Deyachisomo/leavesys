

<?php $__env->startSection('title', 'Leave Requests'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-3"> <!-- Adjusted the margin to mt-3 for consistency -->
    <!-- Page Title -->
    <h2 class="mb-4">Leave Requests</h2>

    <!-- Success Message -->
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <!-- Leave Requests Table -->
    <div class="table-responsive"> <!-- Make table responsive for better viewing -->
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Request ID</th>
                    <th>Employee</th>
                    <th>Leave Type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Days</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $leaveRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($request->LeaveRequestID); ?></td>
                        <td><?php echo e($request->employee->FirstName); ?> <?php echo e($request->employee->LastName); ?></td>
                        <td><?php echo e($request->leaveType->LeaveTypeName); ?></td>
                        <td><?php echo e($request->StartDate); ?></td>
                        <td><?php echo e($request->EndDate); ?></td>
                        <td><?php echo e($request->TotalDays); ?></td>
                        <td>
                            <span class="badge <?php echo e($request->RequestStatus == 'approved' ? 'bg-success' : ($request->RequestStatus == 'rejected' ? 'bg-danger' : 'bg-warning text-dark')); ?>">
                                <?php echo e(ucfirst($request->RequestStatus)); ?>

                            </span>
                        </td>
                        <td>
                            <a href="<?php echo e(route('leave-requests.approve', $request->LeaveRequestID)); ?>" class="btn btn-sm btn-success">Approve</a>
                            <a href="<?php echo e(route('leave-requests.reject', $request->LeaveRequestID)); ?>" class="btn btn-sm btn-danger">Reject</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DEYA\Desktop\leavedb\leavesysdb\resources\views/leave_requests/index.blade.php ENDPATH**/ ?>