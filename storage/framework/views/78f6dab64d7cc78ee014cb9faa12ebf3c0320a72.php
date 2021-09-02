
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        	<a href="<?php echo e(route('products.index')); ?>" class="btn btn-success mt-2 mb-3">Product List</a>
            <?php if(session('status')): ?>
            <div class="alert alert-success">
               <?php echo e(session('status')); ?>

            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header"><?php echo e(__($title)); ?></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <form
                                action="<?php echo e(route('products.store')); ?>"
                                method="POST"
                                enctype="multipart/form-data"
                                class="shadow-sm p-3 bg-white"
                                >
                                <?php echo csrf_field(); ?>
                                <label for="title">Title</label> <br>
                                <input type="text" class="form-control <?php echo e($errors->first('title') ? "is-invald" : ""); ?> " name="title"
                                placeholder="Product title" value="<?php echo e(old('title')); ?>">
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('title')); ?>

                                </div>
                                <br>
                                <label for="cover">Cover</label>
                                <input type="file" class="form-control <?php echo e($errors->first('cover') ? "is-invald" : ""); ?>" name="cover">
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('cover')); ?>

                                </div>
                                <br>

                                <label for="sliders">Sliders</label>
                                <input type="file"
                                    class="form-control <?php echo e($errors->first('slider') ? "is-invald" : ""); ?>"
                                    name="slider[]"
                                    multiple="multiple" id="sliders">
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('slider')); ?>

                                </div>
                                <br>

                                <label for="full-featured-non-premium">Detail Description</label><br>
                                <textarea name="description" id="full-featured-non-premium" class="form-control <?php echo e($errors->first('description') ? "is-invald" : ""); ?>" placeholder="Give a description about this product" value="<?php echo e(old('description')); ?>"></textarea>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('description')); ?>

                                </div>
                                <br>

                                <label for="categories">Categories</label><br>
                                    <select
                                    name="categories[]"
                                    multiple
                                    id="categories"
                                    class="form-control">
                                    </select>
                                <br>

                                <label for="mini-description">Preview Description</label><br>
                                <textarea name="mini_description" id="mini-description" class="form-control <?php echo e($errors->first('mini_description') ? "is-invald" : ""); ?>" placeholder="-Preview Description"><?php echo e(old('mini_description')); ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('mini_description')); ?>

                                </div>
                                <br>

                                <label for="stock">Stock</label><br>
                                <input type="number" class="form-control <?php echo e($errors->first('stock') ? "is-invald" : ""); ?>" id="stock" name="stock"
                                min=0 value=<?php echo e(old('stock')); ?>>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('stock')); ?>

                                </div>
                                <br>

                                <label for="Price">Price</label> <br>
                                <input type="number" class="form-control <?php echo e($errors->first('price') ? "is-invald" : ""); ?>" name="price" id="price"
                                placeholder="Book price" value="<?php echo e(old('price')); ?>">
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('price')); ?>

                                </div>
                                <br>
                                <button
                                class="btn btn-primary"
                                name="save_action"
                                value="PUBLISH">Publish</button>
                                <button
                                class="btn btn-secondary"
                                name="save_action"
                                value="DRAFT">Save as draft</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\_backup\evoush-website\resources\views/dashboard/products/create.blade.php ENDPATH**/ ?>