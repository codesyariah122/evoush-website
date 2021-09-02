
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

        	<a href="<?php echo e(route('products.index')); ?>" class="btn btn-success mt-2 mb-3">Product List</a>

            <div class="card">
                <div class="card-header"><?php echo e(__($title)); ?></div>
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-8">

                            <form enctype="multipart/form-data" method="POST" action="<?php echo e(route('products.update', [$product->id])); ?>" class="p-3 shadow-sm bg-white">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="_method" value="PUT">

                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" value="<?php echo e(old('title') ? old('title') : $product->title); ?>" class="form-control <?php echo e($errors->first('title') ? "is-invalid" : ""); ?> " placeholder="Product Title" id="title">
                                </div>
                                <div class="invalid-feedback">
                                  <?php echo e($errors->first('title')); ?>

                              </div>
                              <br>

                                <div class="form-group">
                                    <label for="cover">Cover</label>
                                    <small class="text-muted">Current cover</small><br>
                                    <?php if($product->cover): ?>
                                    <img src="<?php echo e(asset('storage/' . $product->cover)); ?>" width="96px"/>
                                    <?php endif; ?>
                                    <br><br>
                                    <input
                                    type="file"
                                    class="form-control"
                                    name="cover"
                                    >
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah
                                    cover</small>
                                    <br><br>
                                </div>

                                <div class="form-group">
                                    <label for="slider">Slider</label>
                                    <small class="text-muted">Current slider</small><br>
                                    <?php if($product->slider): ?>
                                    

                                        <?php $__currentLoopData = json_decode($product->slider, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <img src="<?php echo e(asset('storage/product-sliders/' . $slider)); ?>" width="96px"/>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <br><br>
                                    <input
                                    type="file"
                                    class="form-control"
                                    name="slider[]"
                                    multiple="multiple"
                                    >
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah
                                    slider</small>
                                    <br><br>
                                </div>

                                <div class="form-group">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" id="slug" value="<?php echo e(old('slug') ? old('slug') : $product->slug); ?>" placeholder="enter-a-slug" class="form-control <?php echo e($errors->first('slug') ? "is-invalid" : ""); ?> ">
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('slug')); ?>

                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="full-featured-non-premium">Description</label>
                                    <textarea name="description" id="full-featured-non-premium" class="form-control <?php echo e($errors->first('description') ? "is-invalid" : ""); ?> "><?php echo e(old('description') ? old('description') : $product->description); ?></textarea>
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('description')); ?>

                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="categories">Categories</label>
                                    <select multiple class="form-control <?php echo e($errors->first('categories') ? "is-invalid" : ""); ?> " name="categories[]"
                                    id="categories"></select>
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('categories')); ?>

                                </div>
                                <br>

                                <label for="mini-description">Preview Description</label><br>
                                <textarea name="mini_description" id="mini-description" class="form-control <?php echo e($errors->first('mini_description') ? "is-invald" : ""); ?>" placeholder="-Preview Description"><?php echo e(old('mini_description') ? old('mini_description') : $product->mini_description); ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('mini_description')); ?>

                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="stock">Stock</label><br>
                                    <input type="text" class="form-control <?php echo e($errors->first('stock') ? "is-invalid" : ""); ?>" placeholder="Stock"
                                    id="stock" name="stock" value="<?php echo e(old('stock') ? old('stock') : $product->stock); ?>">
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('stock')); ?>

                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control <?php echo e($errors->first('price') ? "is-invalid" : ""); ?>" name="price"
                                    placeholder="Price" id="price" value="<?php echo e(old('price') ? old('price') : $product->price); ?>">
                                </div>
                                <div class="invalid-feedback">
                                    <?php echo e($errors->first('price')); ?>

                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" id="status" class="form-control">
                                       <option <?php echo e($product->status == 'PUBLISH' ? 'selected' : ''); ?>

                                        value="PUBLISH">PUBLISH</option>
                                        <option <?php echo e($product->status == 'DRAFT' ? 'selected' : ''); ?>

                                            value="DRAFT">DRAFT</option>
                                    </select>
                                </div>

                                <button class="btn btn-primary" value="PUBLISH">Update</button>
                            </form>

                       </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

let categories = <?php echo $product->categories; ?>

categories.forEach(function(category){
  let option = new Option(category.name, category.id, true, true);
  $('#categories').append(option).trigger('change');
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\_backup\evoush-website\resources\views/dashboard/products/edit.blade.php ENDPATH**/ ?>