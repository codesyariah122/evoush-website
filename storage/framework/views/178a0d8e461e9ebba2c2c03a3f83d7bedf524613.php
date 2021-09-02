
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

          <hr class="my-3">

        	<a href="<?php echo e(route('event.create')); ?>" class="btn btn-success mt-2 mb-3">Add Event</a>

            <?php if(session('status')): ?>
                <div class="alert alert-success">
                   <?php echo e(session('status')); ?>

               </div>
            <?php endif; ?>

            <form
                action="<?php echo e(route('event.index')); ?>" class="mt-2 mb-2"
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
                       <div class="col-md-12 table-responsive">
                           <table class="table table-bordered table-stripped">
                             <thead>
                                 <tr>
                                     <th><b>Title</b></th>
                                     <th><b>Quotes</b></th>
                                     <th><b>Cover</b></th>
                                     <th><b>File</b></th>
                                     <th><b>Content</b></th>
                                     <th><b>Link</b></th>
                                     <th><b>Action</b></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <tr>
                                     <td><?php echo e($event->title); ?></td>
                                     <td><?php echo e($event->quotes); ?></td>
                                     <td>
                                         <?php if($event->cover): ?>
                                         <img src="<?php echo e(asset('storage/'.$event->cover)); ?>" width="100px" class="img-responsive">
                                         <?php endif; ?>
                                     </td>
                                     <td width="600">
                                      <?php if($event->file): ?>
                                      <ul>
                                        <?php $__currentLoopData = json_decode($event->file, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li>
                                            <img src="<?php echo e(asset('storage/event-files/' . $file)); ?>" width="96px" style="margin-bottom: 15px;"/> <br>
                                          </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </ul>
                                      <?php endif; ?>
                                     </td>
                                     <td><?php echo e($event->content); ?></td>
                                     <td><?php echo e($event->link); ?></td>
                                     <td>
                                       <a
                                       href="<?php echo e(route('event.edit', [$event->id])); ?>"
                                       class="btn btn-info btn-sm"
                                       > Edit </a>

                                       <form
                                       method="POST"
                                       class="d-inline"
                                       onsubmit="return confirm('Move product to trash?')"
                                       action="<?php echo e(route('event.destroy', [$event->id])); ?>"
                                       >
                                        <?php echo csrf_field(); ?>
                                           <input
                                           type="hidden"
                                           value="DELETE"
                                           name="_method">
                                           <input
                                           type="submit"
                                           value="Destroy"
                                           class="btn btn-danger btn-sm">
                                        </form>
                                     </td>
                                 </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </tbody>
                             <tfoot>
                                 <td colspan="10">
                                     <?php echo e($events->appends(Request::all())->links()); ?>

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
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\evoush-backend\resources\views/dashboard/event/index.blade.php ENDPATH**/ ?>