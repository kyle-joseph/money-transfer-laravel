
<?php $__env->startSection('title', 'Transactions'); ?>
<?php $__env->startSection('header', 'Transactions'); ?>
<?php $__env->startSection('content'); ?>

    <div class="content2">
        <div class="transaction-menu">
            <div class="unclaimed">
                <div class="menu">
                    <a href="/transactions/unclaimed"><h1>Unclaimed<br>Transactions</h1></a>
                </div>
            </div>
            <div class="claimed">
                <div class="menu">
                    <a href="/transactions/claimed"><h1>Claimed<br>Transactions</h1></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kylepc/MEGAsync/Web-Project/resources/views/pages/transactions.blade.php ENDPATH**/ ?>