<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3" style="background: white; margin-bottom: 10px">
            <div class="row">
                <h3 class="page-header text-center">Your Notices</h3>
            </div>
        </div>

        <?php if(count($notices)==0): ?>
        <div class="col-md-6 col-md-offset-3" style="background: white;margin-bottom: 2px;">
            <div class="row">
                <h3 class="page-header text-center">No Notice Posted</h3>
                <h5 style="padding-left: 5px;"><a href="<?php echo e(route('dashboard.addNotice')); ?>">Post Now</a></h5>
            </div>
        </div>

        <?php else: ?>
        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-md-offset-3" style="background: white;margin-bottom: 2px;">
            <div class="row">
                <h3 class="page-header text-center"><?php echo e($notice->title); ?></h3>
            </div>

            
                
            

            <div class="row"  style = "padding-bottom: 10px;">
                <div class="col-md-4 text-center">
                    <a href="<?php echo e(route('dashboard.show',['noticeId' => $notice->id])); ?>"  class="btn btn-info btn-sm btn-block">Show</a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="<?php echo e(route('dashboard.edit',['noticeId' => $notice->id ])); ?>" class="btn btn-warning btn-sm btn-block">Edit</a>
                </div>
                <div class="col-md-4 text-center">
                    <form onsubmit="return confirm('Do you really want to Delete this Notice?');" action="<?php echo e(route('dashboard.delete',['noticeId' => $notice->id])); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <input type="submit" name="delBtn" value="Delete"  class="btn btn-danger btn-sm btn-block">
                        <input type="hidden" name="_method" value="DELETE">
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php endif; ?>

        <div class="col-md-6 col-md-offset-3" style="background: white;margin-bottom: 2px;">
            <div class="row">
                <?php echo e($notices->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>