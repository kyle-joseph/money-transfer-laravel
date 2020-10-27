<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $__env->yieldContent('title'); ?></title>

        <!-- <link rel="stylesheet" type="text/css" href="css/style.css">
	    <link rel="stylesheet" type="text/css" href="css/demoStyle.css"> -->
        <link href="<?php echo e(asset('css/demoStyle.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

	    <!-- Font Awesome -->
	    <script src="https://kit.fontawesome.com/3382ceab91.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar">
                <h1>Money Transfer System</h1>
                <ul>
                    <a href="/"><li class="<?php echo e('/' == request()->path()?'active':''); ?>"><i class="fas fa-home"></i>Home</li></a>
                    <a href="/send"><li class="<?php echo e('send' == request()->path()?'active':''); ?>"><i class="fa fa-paper-plane"></i>Send</li></a>
                    <a href="/receive"><li class="<?php echo e('receive' == request()->path()?'active':''); ?>"><i class="fa fa-get-pocket"></i>Claim</li></a>
                    <a href="/transactions"><li class="<?php echo e('transactions' == request()->path() || 'transactions/unclaimed' == request()->path() || 'transactions/claimed' == request()->path() || 'transactions/unclaimed/edit' == request()->path() || 'transactions/report' == request()->path()?'active':''); ?>"><i class="fa fa-money"></i>Transactions</li></a>
                </ul>
            </div>
            <nav class="header">
                    <h1><?php echo $__env->yieldContent('header'); ?></h1>
                    <ul>
                        <li><h2><i class="fas fa-user"></i></h2></li>
                        <li><?php echo e(Auth::user()->username); ?></li>
                        <li>
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        </li>
                    </ul>
            </nav>
            <div class="main_content">
                
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
            <?php echo csrf_field(); ?>
        </form>
        <script type="text/javascript" src="<?php echo e(asset('js/script.js')); ?>""></script>
    </body>
</html>
<?php /**PATH /home/kylepc/MEGAsync/pinakalatest/Web-Project/resources/views/layouts/layout.blade.php ENDPATH**/ ?>