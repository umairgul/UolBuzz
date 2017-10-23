<title>Departments - <?php echo e(config(('app.name'))); ?></title>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div row>
        <h2 class="text-center">All Departments <i class="fa fa-university x-5"></i></h2>
    </div>

    <div class="row" style="background-color: white;">
        <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <a href="<?php echo e(route('departments.show',
                ['$departmentId' => $department->id])); ?>"><h5 class="page-header text-center"><?php echo e($department->department_name); ?></h5></a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>