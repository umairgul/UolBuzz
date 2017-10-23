<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo e(config('app.name')); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome/css/font-awesome.min.css')); ?>">
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
                &nbsp;<li><a href="<?php echo e(route('faculty.index')); ?>"><i class="fa fa-users"></i> Faculty</a></li>
                <li><a href="<?php echo e(route('departments.index')); ?>"><i class="fa fa-university"></i> Departments</a></li>
                <li><a href="<?php echo e(route('files.index')); ?>"><i class="fa fa-file-zip-o"></i> Files</a></li>
                <?php if(Auth::check()): ?>
                    <li><a href="<?php echo e(route('dashboard.add')); ?>"><i class="fa fa-plus-circle"></i> Add Notice</a></li>
                    
                <?php endif; ?>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                <?php if(Auth::guest()): ?>
                    <li><a href="<?php echo e(route('login')); ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
                    <li><a href="<?php echo e(route('register')); ?>"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user-circle fa-fw fa-lg"></i> <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                </a>
                                <a href="<?php echo e(route('dashboard.index')); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
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

<?php echo $__env->yieldContent('content'); ?>


<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>