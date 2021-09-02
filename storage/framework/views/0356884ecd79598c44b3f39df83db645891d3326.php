
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        	<a href="<?php echo e(route('categories.create')); ?>" class="btn btn-sm btn-primary mt-2 mb-3">Create Category</a>
        	<div class="row">
        		<div class="col-md-6">			
		        	<form action="<?php echo e(route('categories.index')); ?>" class="mt-2 mb-3">
		        		<div class="input-group">
		        			<input
		        			type="text"
		        			class="form-control"
		        			placeholder="Filter by category name"
		        			name="name">
		        			<div class="input-group-append">
		        				<input
		        				type="submit"
		        				value="Filter"
		        				class="btn btn-primary">
		        			</div>
		        		</div>
		        	</form>
        		</div>

	        	<div class="col-md-6">
	        		<ul class="nav nav-pills card-header-pills">
	        			<li class="nav-item">
	        				<a class="nav-link active" href="
	        				<?php echo e(route('categories.index')); ?>">Published</a>
	        			</li>
	        			<li class="nav-item">
	        				<a class="nav-link" href="
	        				<?php echo e(route('categories.trash')); ?>">Trash</a>
	        			</li>
	        		</ul>
	        	</div>
        	</div>


        	<?php if(session('status')): ?>
        	<div class="row">
        		<div class="col-md-12">
        			<div class="alert alert-warning">
        				<?php echo e(session('status')); ?>

        			</div>
        		</div>
        	</div>
        	<?php endif; ?>


            <div class="card">
                <div class="card-header"><?php echo e(__($title)); ?></div>
                <div class="card-body">
	             	<div class="row">
						<div class="col-md-12">
					 	<table class="table table-bordered table-stripped">
						 <thead>
						 <tr>
						 <th><b>Name</b></th>
						 <th><b>Slug</b></th>
						 <th><b>Image</b></th>
						 <th><b>Actions</b></th>
						 </tr>
						 </thead>
						 <tbody>
						 <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						 <tr>
						 <td><?php echo e($category->name); ?></td>
						 <td><?php echo e($category->slug); ?></td>
						 <td>
						 <?php if($category->image): ?>
						 <img
						 src="<?php echo e(asset('storage/' . $category->image)); ?>"
						 width="48px"/>
						 <?php else: ?>
						 No image
						 <?php endif; ?>
						 </td>
						 <td>
						 	<a href="<?php echo e(route('categories.edit', [$category->id])); ?>" class="btn btn-info btn-sm"> Edit </a>
						 	<form
						 	class="d-inline"
						 	action="<?php echo e(route('categories.destroy', [$category->id])); ?>"
						 	method="POST"
						 	onsubmit="return confirm('Move category to trash?')"
						 	>
						 	<?php echo csrf_field(); ?>
							 	<input
							 	type="hidden"
							 	value="DELETE"
							 	name="_method">
							 	<input
							 	type="submit"
							 	class="btn btn-danger btn-sm"
							 	value="Trash">
							 </form>
						 </td>
						 </tr>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						 </tbody>
						 <tfoot>
						 <tr>
						 <td colSpan="10">
						 <?php echo e($categories->appends(Request::all())->links()); ?>

						 </td>
						 </tr>
						 </tfoot>
					 	</table>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\_backup\evoush-website\resources\views/dashboard/category/index.blade.php ENDPATH**/ ?>