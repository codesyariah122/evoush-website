
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

        	<a href="<?php echo e(route('categories.index')); ?>" class="btn btn-success mt-2 mb-3">Category List</a>

            <div class="card">
                <div class="card-header"><?php echo e(__($title)); ?></div>
                <div class="card-body">
                    <form
                         enctype="multipart/form-data"
                         class="bg-white shadow-sm p-3"
                         action="<?php echo e(route('categories.store')); ?>"
                         method="POST">
                         <?php echo csrf_field(); ?>
                         <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control <?php echo e($errors->first('name') ? "is-invalid" : ""); ?>" value="<?php echo e(old('name')); ?>" id="name">
                         </div>

                         <div class="invalid-feedback">
                             <?php echo e($errors->first('name')); ?>

                         </div>
                         <br>
                         
                         <div class="form-group">
                             <label for="image">Image Category</label>
                             <input type="file" class="form-control <?php echo e($errors->first('image') ? "is-invalid" : ""); ?> " name="image" value="<?php echo e(old('image')); ?>">
                         </div>

                         <div class="invalid-feedback">
                             <?php echo e($errors->first('image')); ?>

                         </div>
                        <button type="submit" class="btn btn-primary">Save</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\_backup\evoush-website\resources\views/dashboard/category/create.blade.php ENDPATH**/ ?>