

<?php $__env->startSection('title', 'Manage Positions'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Manage Positions</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-end mb-4">
        <a href="<?php echo e(route('positions.create')); ?>" class="btn btn-success">Add New Position</a>
    </div>

    <?php if($positions->isNotEmpty()): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary text-center">
                    <tr>
                        <th>#</th>
                        <th>Position Name</th>
                        <th>Grade</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $positions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $position): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($position->PositionName); ?></td>
                            <td><?php echo e($position->grade->GradeName ?? 'N/A'); ?></td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="<?php echo e(route('positions.edit', $position->PositionID)); ?>" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="<?php echo e(route('positions.destroy', $position->PositionID)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this position?');">
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
        <div class="alert alert-info text-center">No positions found. Click "Add New Position" above to add one.</div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DEYA\Desktop\leavedb\leavesysdb\resources\views/positions/index.blade.php ENDPATH**/ ?>