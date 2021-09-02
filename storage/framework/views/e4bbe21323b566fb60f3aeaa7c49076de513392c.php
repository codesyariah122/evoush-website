
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?> <b><?php echo e(Auth::user()->username); ?></b> </div>

                <div class="card-body">

                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(in_array("ADMIN", json_decode(Auth::user()->roles))): ?>
                         <b><?php echo e(__('You are logged in ! as a')); ?> ADMINISTRATOR </b>

                    <?php elseif(in_array("MEMBER", json_decode(Auth::user()->roles))): ?>
                        <b><?php echo e(__('You are logged in !')); ?> as a MEMBER SPONSOR </b>
                    <?php elseif(in_array("FOLLOWER", json_decode(Auth::user()->roles))): ?>
                        <b><?php echo e(__('You are logged in !')); ?> as a MEMBER </b> | <b><?php echo e(Auth::user()->username); ?></b>
                        <br>

                        <blockquote class="blockquote-footer">
                            Your Sponsor : <a href="<?php echo e(route('member.username', [$sponsor->username])); ?>"><b><?php echo e($sponsor->username); ?></b></a>
                        </blockquote>
                    <?php elseif(in_array("AUTHOR", json_decode(Auth::user()->roles))): ?>
                        <b><?php echo e(__('You are logged in ! as a')); ?> AUTHOR  | <?php echo e(Auth::user()->username); ?></b>
                    <?php elseif(in_array("STAFF", json_decode(Auth::user()->roles))): ?>
                        <b><?php echo e(__('You are logged in ! as a')); ?> STAFF  | <?php echo e(Auth::user()->username); ?></b>
                    <?php endif; ?>
                    

                    

                    

                    

                </div>
            </div>
        </div>
    </div>
</div>


<style type="text/css">
    blockquote{
        font-size: 21px!important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard.global', ['brand' => 'evoush'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\_backup\evoush-website\resources\views/dashboard/index.blade.php ENDPATH**/ ?>