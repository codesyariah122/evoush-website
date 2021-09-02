
<?php $__env->startSection('title'); ?> <?php echo e($title); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">

			<div class="row">
				<div class="col-md-6">
					<form action="<?php echo e(route('contact.index')); ?>" class="mt-2 mb-3">
						<div class="input-group">
							<input
							type="text"
							class="form-control"
							placeholder="Filter by contact name"
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
							<?php echo e(route('contact.index')); ?>">Published</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="
							<?php echo e(route('contact.trash')); ?>">Trash</a>
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

			<?php
			$no = 1;
			?>

			<div class="card">
				<div class="card-header"><?php echo e(__($title)); ?></div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered table-stripped table-responsive">
								<thead>
									<tr>
										<th><b>No Peserta</b></th>
										<th><b>Name</b></th>
										<th><b>Email</b></th>
										<th><b>Username</b></th>
										<th><b>Phone</b></th>
										<th><b>Category</b></th>
										<th><b>Message</b></th>
										<th><b>Province</b></th>
										<th><b>City</b></th>
										<th><b>Ip Address</b></th>
										<th><b>Actions</b></th>
									</tr>
								</thead>
								<tbody>
									<?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($contact->id); ?></td>
										<td><?php echo e($contact->name); ?></td>
										<td><?php echo e($contact->email); ?></td>
										<td><?php echo e($contact->username); ?></td>
										<td><?php echo e($contact->phone); ?></td>
										<td>
											<?php echo e($contact->category_name); ?>

										</td>
										<td><?php echo e($contact->message); ?></td>
										<td><?php echo e($contact->country); ?></td>
										<td><?php echo e($contact->city); ?></td>
										<td><?php echo e($contact->ip_address); ?></td>
										<td>
											<form
											class="d-inline"
											action="<?php echo e(route('contact.destroy', [$contact->id])); ?>"
											method="POST"
											onsubmit="return confirm('Move contact to trash?')"
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
<?php echo $__env->make('layouts.dashboard.global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\evoush-backend\resources\views/dashboard/contacts/index.blade.php ENDPATH**/ ?>