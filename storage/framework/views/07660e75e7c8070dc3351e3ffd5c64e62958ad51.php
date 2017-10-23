<title>Watch | Dashboard - <?php echo e(config(('app.name'))); ?></title>
<?php $__env->startSection('content'); ?>
<div class="container">

        <div class="col-md-offset-3 col-md-6 whitebox">
            <?php if(Auth::id() != $singlenotice->user_id): ?>
            <div class="row">
                <h3 class="page-header text-center">Access Denied!</h3>
            </div>
            <?php else: ?>
            <div class="row">
                <h3 class="page-header text-center"><?php echo e($singlenotice->title); ?></h3>
            </div>
            <div class="row">
                <p class="text-justify"><?php echo e($singlenotice->body); ?></p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <hr>
                    <h5 class="text-center" data-toggle="tooltip" data-placement="bottom" title="Posting Date"><?php echo e($singlenotice->created_at); ?></h5>
                </div>
                <div class="col-md-6">
                    <hr>
                    <h5 class="text-center" data-toggle="tooltip" data-placement="bottom" title="Last Updated"><?php echo e($singlenotice->updated_at); ?></h5>
                </div>
            </div>

            <div class="row" style="padding-bottom: 10px">
                <div class="col-md-12">
                    <a href="<?php echo e(route('dashboard.edit',['noticeId' => $singlenotice->id])); ?>" class="btn btn-default btn-sm btn-block">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>