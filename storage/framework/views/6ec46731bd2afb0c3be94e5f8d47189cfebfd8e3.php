<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
        <div class="col-md-6" style="background: white">

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

            <div class="row">
                <h2 class="page-header text-center">Add Notice</h2>
            </div>

            <form action="<?php echo e(route('dashboard.store')); ?>" method="POST" style="padding-left: 10px; padding-right: 10px;" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-control" name="noticeTitle" placeholder="Give Title to Notice" value="<?php echo e(old('noticeTitle')); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <textarea name="noticeBody" id="" cols="30" rows="8" class="form-control" placeholder="Add Notice Details Here" style="resize: none"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <button type="submit" name="postBtn" class="btn btn-default btn-sm btn-block"><i class="fa fa-send-o"></i> Post</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-6" style="background: white">

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

            <div class="row">
                <h2 class="page-header text-center">Upload File</h2>
            </div>

            <form action="<?php echo e(route('dashboard.uploadfile')); ?>" method="POST" style="padding-left: 10px; padding-right: 10px;" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>


                <div class="row">
                    <div class="form-group">
                        <input type="file" class="form-control" name="attachment" value="Attach">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <button type="submit" name="postBtn" class="btn btn-default btn-sm btn-block"><i class="fa fa-send-o"></i> Post</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>