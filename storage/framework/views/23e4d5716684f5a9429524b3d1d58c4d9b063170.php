<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <div class="row">
                <h2 class="page-header text-center">Add Notice</h2>
            </div>
            <form action="<?php echo e(route('dashboard.store')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="form-group">
                        <input type="text" class="form-control" name="noticeTitle" placeholder="Give Title to Notice">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <textarea name="noticeBody" id="" cols="30" rows="8" class="form-control" placeholder="Add Notice Details Here">

                        </textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group">
                        <input type="submit" name="postNotice" value="Post Now" class="btn btn-info btn-block btn-sm">
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>