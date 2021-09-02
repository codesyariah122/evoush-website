
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
               <div class="col-md-6"></div>
               <div class="col-md-6">
                   <ul class="nav nav-pills card-header-pills">
                       <li class="nav-item">
                           <a class="nav-link <?php echo e(Request::get('status') == NULL &&
                           Request::path() == 'products' ? 'active' : ''); ?>" href="
                           <?php echo e(route('products.index')); ?>">All</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link <?php echo e(Request::get('status') == 'publish' ?
                           'active' : ''); ?>" href="<?php echo e(route('products.index', ['status' =>
                           'publish'])); ?>">Publish</a>
                       </li>
                       <li class="nav-item">
                           <a class="nav-link <?php echo e(Request::get('status') == 'draft' ? 'active'
                           : ''); ?>" href="<?php echo e(route('products.index', ['status' => 'draft'])); ?>">Draft</a>
                       </li>
                       <li class="nav-item">
                            <a class="nav-link <?php echo e(Request::path() == 'products/trash' ? 'active'
                            : ''); ?>" href="<?php echo e(route('products.trash')); ?>">Trash</a>
                        </li>
                    </ul>
                </div>
            </div>

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                   <?php echo e(session('status')); ?>

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
                                        <th>Cover</th>
                                        <th>Title</th>
                                        <th>Categories</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php if($product->cover): ?>
                                            <img src="<?php echo e(asset('storage/' . $product->cover)); ?>"
                                            width="96px"/>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($product->title); ?></td>
                                        <td>
                                            <ul class="pl-3">
                                               <?php $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                               <li><?php echo e($category->name); ?></li>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           </ul>
                                        </td>
                                        <td><?php echo e($product->stock); ?></td>
                                        <td>Rp. <?php echo e(number_format($product->price, 2)); ?></td>
                                        <td>
                                            <form
                                            method="POST"
                                            action="<?php echo e(route('products.restore', [$product->id])); ?>"
                                            class="d-inline"
                                            >
                                                <?php echo csrf_field(); ?>
                                                <input type="submit" value="Restore" class="btn btn-success"/>
                                            </form>

                                            <form
                                            method="POST"
                                            action="<?php echo e(route('products.deletepermanent', [$product->id])); ?>"
                                            class="d-inline"
                                            onsubmit="return confirm('Delete this product permanently?')"
                                            >
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Delete" class="btn btn-danger">
                                            </form>

                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="10">
                                            <?php echo e($products->appends(Request::all())->links()); ?>

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
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\_backup\evoush-website\resources\views/dashboard/products/trash.blade.php ENDPATH**/ ?>