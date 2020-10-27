
<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('header', 'Home'); ?>
<?php $__env->startSection('content'); ?>
    <div class="content2">
        <div class="banner">
            <div class="banner-title"><h1>Money Transfer System</h1></div>
            <div class="overlay"></div>
        </div>
        <div class="quick-links">
            <a href="/send">
                <div class="menu">
                    <h1><i class="fa fa-paper-plane"></i><br>Send</h1>
                </div>
            </a>
            <a href="/receive">
                <div class="menu">
                    <h1><i class="fa fa-get-pocket"></i><br>Claim</h1>
                </div>
            </a>
            <a href="/transactions">
                <div class="menu">
                    <h1><i class="fa fa-money"></i><br>Transactions</h1>
                </div>
            </a>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kyle/MEGAsync/Web Projects/pinakalatest/Web-Project/resources/views/pages/index.blade.php ENDPATH**/ ?>