<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo e(config('app.name')); ?></title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    </head>
    <body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;<li><a href="<?php echo e(route('faculty.index')); ?>">Faculty</a></li>
                    <li><a href="<?php echo e(route('departments.index')); ?>">Departments</a></li>
                    <?php if(Auth::check()): ?>
                        <li><a href="<?php echo e(route('dashboard.add')); ?>">Add Notice</a></li>
                        
                    <?php endif; ?>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo e(csrf_field()); ?>

                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php $__currentLoopData = $allNotices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-offset-3 col-md-6 whitebox" id="ntcarea">
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
            <div class="col-md-offset-3 col-md-6">
                <div class="row">
                    <?php echo e($allNotices->links()); ?>

                </div>
            </div>
    </div>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>

    </body>
</html>
