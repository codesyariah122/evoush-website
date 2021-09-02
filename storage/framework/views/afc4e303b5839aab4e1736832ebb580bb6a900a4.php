
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="row">
               <div class="col-md-6 mt-2"></div>
               <div class="col-md-6">
                   <ul class="nav nav-pills">
                       <li class="nav-item">
                           <a class="nav-link" href="<?php echo e(route('products.index')); ?>">All</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="<?php echo e(route('products.index', ['status' =>
                           'publish'])); ?>">Publish</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="<?php echo e(route('products.index', ['status' =>
                           'draft'])); ?>">Draft</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link" href="<?php echo e(route('products.trash')); ?>">Trash</a>
                       </li>
                   </ul>
               </div>
           </div>
           <hr class="my-3">

        	<a href="<?php echo e(route('products.create')); ?>" class="btn btn-success mt-2 mb-3">Add Product</a>

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                   <?php echo e(session('status')); ?>

               </div>
            <?php endif; ?>

            <form
                action="<?php echo e(route('products.index')); ?>" class="mt-2 mb-2"
                >
                <div class="input-group">
                    <input name="keyword" type="text" value="<?php echo e(Request::get('keyword')); ?>" class="form-control" placeholder="Filter by title">
                    <div class="input-group-append">
                       <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
                </div>
            </form>

            <div class="card">
                <div class="card-header"><?php echo e(__($title)); ?></div>
               
                <div class="card-body">
                   <div class="row">
                       <div class="col-md-12">
                           <table class="table table-bordered table-stripped">
                             <thead>
                                 <tr>
                                     <th><b>Cover</b></th>
                                     <th><b>Title</b></th>
                                     <th><b>Status</b></th>
                                     <th><b>Categories</b></th>
                                     <th><b>Stock</b></th>
                                     <th><b>Price</b></th>
                                     <th><b>Action</b></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                     <td>
                                         <?php if($product->cover): ?>
                                         <img src="<?php echo e(asset('storage/'.$product->cover)); ?>" width="100px" class="img-responsive">
                                         <?php else: ?>
                                         No Product Cover
                                         <?php endif; ?>
                                     </td>
                                     <td><?php echo e($product->title); ?></td>
                                     <td>
                                         <?php if($product->status == "DRAFT"): ?>
                                         <span class="badge badge-dark text-white"><?php echo e($product->status); ?></span>
                                         <?php else: ?>
                                         <span class="badge badge-success"><?php echo e($product->status); ?></span>
                                         <?php endif; ?>
                                     </td>
                                     <td>
                                         <ul>
                                             <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <li><?php echo e($category->name); ?></li>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </ul>
                                     </td>
                                     <td><?php echo e($product->stock); ?></td>
                                     <td>Rp. <?php echo e(number_format($product->price, 2)); ?></td>
                                     <td>
                                       <a
                                       href="<?php echo e(route('products.edit', [$product->id])); ?>"
                                       class="btn btn-info btn-sm"
                                       > Edit </a>

                                       <form
                                       method="POST"
                                       class="d-inline"
                                       onsubmit="return confirm('Move product to trash?')"
                                       action="<?php echo e(route('products.destroy', [$product->id])); ?>"
                                       >
                                        <?php echo csrf_field(); ?>
                                           <input
                                           type="hidden"
                                           value="DELETE"
                                           name="_method">
                                           <input
                                           type="submit"
                                           value="Trash"
                                           class="btn btn-danger btn-sm">
                                        </form>
                                     </td>
                                 </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </tbody>
                             <tfoot>
                                 <td colspan="10">
                                     <?php echo e($products->appends(Request::all())->links()); ?>

                                 </td>
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
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\_backup\evoush-website\resources\views/dashboard/products/index.blade.php ENDPATH**/ ?>