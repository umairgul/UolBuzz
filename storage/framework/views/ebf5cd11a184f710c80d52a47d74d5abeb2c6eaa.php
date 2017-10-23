<?php $__env->startSection('content'); ?>

    <div class="container">

        <?php if(count($myfiles) == 0): ?>
            <div class="col-md-offset-3 col-md-6 whitebox">
                <div class="row">
                    <h5 class="page-header text-center">No Files Uploaded</h5>
                </div>
            </div>
        <?php else: ?>

            <div class="col-md-offset-3 col-md-6 whitebox">
                <div class="row">
                    <h3 class="page-header text-center">My Files</h3>
                </div>
            </div>

            <?php $__currentLoopData = $myfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-offset-3 col-md-6 whitebox">
                    <form onsubmit="return confirm('Delete File?');" action="<?php echo e(route('dashboard.deleteFile',['fileId' => $file->id])); ?>">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <h5 class="page-header"><?php echo e($file->filename); ?></h5>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group pull-right">
                                    <button class="btn btn-default btn-sm" style="margin-top: 20px"><i class="fa fa-trash-o"></i></button>
                                    <input type="hidden" name="_method" value="DELETE">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>

        <div class="col-md-offset-3 col-md-6">
            <div class="row">
                <?php echo e($myfiles->links()); ?>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>