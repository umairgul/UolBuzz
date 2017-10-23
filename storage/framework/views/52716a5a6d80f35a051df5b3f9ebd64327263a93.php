<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">

            <?php if(count($notices)==0): ?>
                <div class="col-md-6 col-md-offset-3 whitebox" >
                    <div class="row">
                        <h3 class="page-header text-center">No Notice Posted</h3>
                        <h5 style="padding-left: 5px;"><a href="<?php echo e(route('dashboard.add')); ?>">Post Now</a></h5>
                    </div>
                </div>

            <?php else: ?>

                <div class="col-md-6 col-md-offset-3" style="background: white; margin-bottom: 10px">
                    <div class="row">
                        <h3 class="page-header text-center">Posted Notices</h3>
                    </div>
                </div>

                <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-md-offset-3 whitebox">
                        <div class="row">
                            <h3 class="page-header text-center"><?php echo e($notice->title); ?></h3>
                        </div>

                        
                        
                        

                        <div class="row"  style = "padding-bottom: 10px;">


                            <div class="col-md-4 text-center">
                                <a href="<?php echo e(route('dashboard.show',['noticeId' => $notice->id])); ?>" data-toggle="tooltip" title="Watch" class="btn btn-default btn-sm btn-block">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </div>



                            <div class="col-md-4 text-center">
                                <a href="<?php echo e(route('dashboard.edit',['noticeId' => $notice->id ])); ?>" data-toggle="tooltip" title="Edit" class="btn btn-default btn-sm btn-block">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                            </div>



                            <div class="col-md-4 text-center">
                                <form onsubmit="return confirm('Do you really want to Delete this Notice?');" action="<?php echo e(route('dashboard.delete',['noticeId' => $notice->id])); ?>" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                    <button type="submit" name="delBtn" data-toggle="tooltip" title="Delete" class="btn btn-default btn-sm btn-block t">
                                        <li class="fa fa-trash-o"></li>
                                    </button>
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
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>