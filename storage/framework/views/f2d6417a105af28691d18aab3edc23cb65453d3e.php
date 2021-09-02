
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php if(session('status')): ?>
            <div class="alert alert-success">
               <?php echo e(session('status')); ?>

           </div>
           <?php endif; ?>

        	<a href="<?php echo e(route('categorymessage.index')); ?>" class="btn btn-success mt-2 mb-3">Category List</a>

            <div class="card">
                <div class="card-header"><?php echo e(__($title)); ?></div>
                <div class="card-body">
                    <form                         
                        class="bg-white shadow-sm p-3"
                        action="<?php echo e(route('categorymessage.store')); ?>"
                        method="POST">
                            <?php echo csrf_field(); ?>
                         <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="category_name" class="form-control <?php echo e($errors->first('name') ? "is-invalid" : ""); ?>" value="<?php echo e(old('name')); ?>" id="name">
                         </div>
                         <div class="invalid-feedback">
                             <?php echo e($errors->first('name')); ?>

                         </div>

                         <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" name="caption" class="form-control <?php echo e($errors->first('caption') ? "is-invalid" : ""); ?>" value="<?php echo e(old('caption')); ?>" id="name">
                         </div>

                         <div class="invalid-feedback">
                             <?php echo e($errors->first('caption')); ?>

                         </div>
                         <br>
                         
                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\evoush-backend\resources\views/dashboard/category_message/create.blade.php ENDPATH**/ ?>