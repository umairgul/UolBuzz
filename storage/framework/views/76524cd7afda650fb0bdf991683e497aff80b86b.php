<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <h4 class="page-header text-center">Admin Panel</h4>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>