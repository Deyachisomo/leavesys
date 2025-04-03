<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> - Leave Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body>
    <!-- Top Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo e(route('dashboard')); ?>">Leave Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary text-white" href="<?php echo e(route('dashboard')); ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary text-white" href="<?php echo e(route('leave.requests.index')); ?>">Leave Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary text-white" href="<?php echo e(route('supervisor.dashboard')); ?>">Supervisor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary text-white" href="<?php echo e(route('employee.dashboard')); ?>">Employee Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary text-white" href="<?php echo e(route('profile.edit')); ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary text-white" href="<?php echo e(route('leaves.create')); ?>">Apply Leave</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="btn btn-danger btn-sm nav-link">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Notification Section -->
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Content Wrapper -->
    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Optional Sidebar -->
            <?php echo $__env->yieldContent('sidebar'); ?>

            <!-- Main Content -->
            <div class="col">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-4">
        <p class="mb-0">&copy; <?php echo e(date('Y')); ?> ABC Mission Hospital. All rights reserved.</p>
        <p class="mb-0">Powered by MUST INTERNS</p>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\DEYA\Desktop\leavedb\leavesysdb\resources\views/layouts/app.blade.php ENDPATH**/ ?>