<?php $__env->startSection('content'); ?>
<div class="container">

    <?php if(count($singleFaculty) == 0): ?>
        <div class="col-md-offset-3 col-md-6 whitebox">
            <div class="row">
                <h5 class="page-header text-center">No Notices Found against Selected Faculty</h5>
            </div>
        </div>
    <?php else: ?>

        <div class="col-md-offset-3 col-md-6 whitebox">
            <div class="row">
                <h3 class="page-header text-center">Faculty Notices</h3>
            </div>
        </div>

    <?php $__currentLoopData = $singleFaculty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-offset-3 col-md-6 whitebox">
            <div class="row">
                <h3 class="page-header text-center"><?php echo e($notice->title); ?></h3>
            </div>
            <div class="row">
                <p class="text-justify"><?php echo e($notice->body); ?></p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <hr>
                    <h5 class="text-center"><?php echo e($notice->name); ?></h5>
                </div>
                <div class="col-md-4">
                    <hr>
                    <h5 class="text-center"><?php echo e($notice->department_name); ?></h5>
                </div>
                <div class="col-md-4">
                    <hr>
                    <h5 class="text-center"><?php echo e($notice->updated_at); ?></h5>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

        <div class="col-md-offset-3 col-md-6">
            <div class="row">
                <?php echo e($singleFaculty->links()); ?>

            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>