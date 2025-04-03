

<?php $__env->startSection('title', 'Add Position'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Add Position</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('positions.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label for="PositionName" class="form-label">Position Name</label>
            <input type="text" id="PositionName" name="PositionName" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="GradeID" class="form-label">Grade</label>
            <select id="GradeID" name="GradeID" class="form-select" required>
                <?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($grade->GradeID); ?>"><?php echo e($grade->GradeName); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Position</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DEYA\Desktop\leavedb\leavesysdb\resources\views/positions/create.blade.php ENDPATH**/ ?>