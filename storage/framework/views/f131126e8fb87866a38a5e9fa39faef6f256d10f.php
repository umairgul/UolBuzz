<?php $__env->startSection('content'); ?>
    <div class="container">

        <?php if(count($facultyFiles) == 0): ?>
            <div class="col-md-offset-3 col-md-6 whitebox">
                <div class="row">
                    <h5 class="page-header text-center">No Files Found against Selected Faculty</h5>
                </div>
            </div>
        <?php else: ?>

            <div class="col-md-offset-3 col-md-6 whitebox">
                <div class="row">
                    <h3 class="page-header text-center">Faculty Files</h3>
                </div>
            </div>

            <?php $__currentLoopData = $facultyFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-offset-3 col-md-6 whitebox">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="page-header text-center"><a href="../files/<?php echo e($file->filename); ?>" download="<?php echo e($file->filename); ?>"><?php echo e($file->filename); ?></a></h5>
                        </div>

                        <div class="col-md-4">
                            <h5 class="page-header text-center"><?php echo e($file->name); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <div class="col-md-offset-3 col-md-6">
            <div class="row">
                <?php echo e($facultyFiles->links()); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>