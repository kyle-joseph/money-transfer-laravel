<?php $__env->startSection('title', 'Transactions'); ?>
<?php $__env->startSection('header', 'Daily Report'); ?>
<?php $__env->startSection('content'); ?>
<div class="content2">
    <a href="/transactions"><input type="submit" value="Back"></a>
    <div class="report">
        <h2>Daily Report as of <?php echo e(date('Y-m-d')); ?></h2>
        <div class="report-chart">
            <?php echo $chart->container(); ?>

            <?php echo $chart->script(); ?>    
        </div>
    </div>        
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kylepc/MEGAsync/pinakalatest/Web-Project/resources/views/transactions/report.blade.php ENDPATH**/ ?>