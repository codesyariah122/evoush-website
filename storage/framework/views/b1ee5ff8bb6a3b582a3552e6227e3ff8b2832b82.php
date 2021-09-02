
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xs-12 col-sm-12">
            <a href="<?php echo e(route('users.create')); ?>" class="btn btn-sm btn-primary mt-2 mb-3">Create New User</a>

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>
            <form action="<?php echo e(route('users.index')); ?>">
             <div class="input-group mb-3">
               <input
               value="<?php echo e(Request::get('keyword')); ?>"
               name="keyword"
               class="form-control col-md-10"
               type="text"
               placeholder="Filter berdasarkan email"/>
               <div class="input-group-append">
                 <input
                 type="submit"
                 value="Filter"
                 class="btn btn-primary">
               </div>
             </div>
           </form>

            <div class="card">
                <div class="card-header"><?php echo e(__('List User')); ?></div>
                <div class="card-body">
                    <table class="table table-bordered">
                       <thead>
                           <tr>
                               <th><b>Name</b></th>
                               <th><b>Username</b></th>
                               <th><b>Email</b></th>
                               <th><b>Avatar</b></th>
                               <th><b>Status</b></th>
                               
                               <th><b>Action</b></th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <tr>
                               <td><?php echo e($user->name); ?></td>
                               <td><?php echo e($user->username); ?></td>
                               <td><?php echo e($user->email); ?></td>
                               <td>
                                   <?php if($user->avatar): ?>
                                   <img src="<?php echo e(asset('storage/'.$user->avatar)); ?>" width="70px">
                                   <?php else: ?>
                                   <img src="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/profile/default.jpg" width="80">
                                   <?php endif; ?>
                               </td>
                               <td>
                                 <?php if($user->status == "ACTIVE"): ?>
                                 <span class="badge badge-success">
                                   <?php echo e($user->status); ?>

                                 </span>
                                 <?php else: ?>
                                 <span class="badge badge-danger">
                                   <?php echo e($user->status); ?>

                                 </span>
                                 <?php endif; ?>
                               </td>

                               

                               <td>
                                 <a class="btn btn-info text-white btn-sm" href="<?php echo e(route('users.edit',
                                 [$user->id])); ?>">Edit</a>

                                 <form
                                     onsubmit="return confirm('Delete this user permanently?')"
                                     class="d-inline"
                                     action="<?php echo e(route('users.destroy', [$user->id])); ?>"
                                     method="POST">
                                     <?php echo csrf_field(); ?>
                                     <input
                                     type="hidden"
                                     name="_method"
                                     value="DELETE">
                                     <input
                                     type="submit"
                                     value="Delete"
                                     class="btn btn-danger btn-sm">
                                </form>

                                <a
                                href="<?php echo e(route('users.show', [$user->id])); ?>"
                                class="btn btn-primary btn-sm">Detail</a>
                               </td>
                           </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </tbody>
                       <tfoot>
                         <td colspan="10">
                          <?php echo e($users->appends(Request::all())->links()); ?>

                         </td>
                       </tfoot>
                   </table>

                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    ul li{
        list-style: none;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\evoush-backend\resources\views/dashboard/users/index.blade.php ENDPATH**/ ?>