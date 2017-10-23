<?php $__env->startSection('content'); ?>
<div class="container">

  <?php if(count($errors)>0): ?>
      <div class="row" style="padding-left: 10px; padding-right: 10px; padding-top: 10px">
          <div class="alert alert-danger">
              <ul>
                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><?php echo e($error); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      </div>
  <?php endif; ?>

  <div class="col-md-6 col-md-offset-3" style="background: white; margin-bottom: 10px">
    <div class="row">
      <h3 class="text-center page-header">Change Password</h3>
    </div>
  </div>

  <div class="col-md-6 col-md-offset-3" style="background: white; margin-bottom: 10px">
      <form class="form-horizontal" action="<?php echo e(route('changepass.change')); ?>" method="post" style="padding:10px">
        <?php echo e(csrf_field()); ?>

        <div class="form-group">
          <input type="password" name="oldPassword" class="form-control" placeholder="Enter Old Password" required>
        </div>
        <div class="form-group">
          <input type="password" name="newPassword" class="form-control" placeholder="Enter New Password" required>
        </div>
        <div class="form-group">
          <button type="submit" name="changepass" class="btn btn-default btn-block">Change Password</button>
          <!-- <input type="hidden" name="_method" value="PUT"> -->
        </div>
      </form>
  </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>