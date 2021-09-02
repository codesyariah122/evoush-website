<!DOCTYPE html>
<html lang="en">
<!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<head>

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('layouts.dashboard.Partial.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php if(in_array("ADMIN", json_decode(Auth::user()->roles))): ?>
            <?php echo $__env->make('layouts.dashboard.Partial.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif(in_array("STAFF", json_decode(Auth::user()->roles))): ?>
            <?php echo $__env->make('layouts.dashboard.Partial.staff.sidebarstaff', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <?php endif; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php echo $__env->make('layouts.dashboard.Partial.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo $__env->yieldContent('content'); ?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php echo $__env->make('layouts.dashboard.Partial.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->


    <!-- Logout Modal-->
    <?php echo $__env->make('layouts.dashboard.Partial.logoutmodal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('layouts.dashboard.Partial.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html><?php /**PATH C:\Users\Evoush\puji_titip\evoush-backend\resources\views/layouts/dashboard/global.blade.php ENDPATH**/ ?>