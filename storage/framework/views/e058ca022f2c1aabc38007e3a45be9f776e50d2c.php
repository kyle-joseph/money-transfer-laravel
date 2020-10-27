<?php $__env->startSection('title', 'Transactions'); ?>
<?php $__env->startSection('header', 'Unclaimed Transactions'); ?>
<?php $__env->startSection('content'); ?>
<div class="content2">
    <a href="/transactions"><input type="submit" value="Back"></a>
        <div class="trans-table">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Control Number</th>
                        <th>Sender Name</th>
                        <th>Sender Address</th>
                        <th>Recipient Name</th>
                        <th>Recipient Address</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($senders) > 0): ?>
                        <?php $__currentLoopData = $senders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($data->controlNumber); ?></td>
                                <td><?php echo e($data->senderFirstName); ?> <?php echo e($data->senderLastName); ?></td>
                                <td><?php echo e($data->sbarangay); ?>, <?php echo e($data->scityMun); ?>, <?php echo e($data->sprovince); ?></td>
                                <td><?php echo e($data->recipientFirstName); ?> <?php echo e($data->recipientLastName); ?></td>
                                <td><?php echo e($data->rbarangay); ?>, <?php echo e($data->rcityMun); ?>, <?php echo e($data->rprovince); ?></td>
                                <td><?php echo e($data->amount); ?></td>
                                <td><input type="submit" value="Edit" onclick="event.preventDefault();
                                    document.getElementById('<?php echo e($data->controlNumber); ?>').submit();"></td>
                                <form id="<?php echo e($data->controlNumber); ?>" action="/transactions/unclaimed/edit" method="GET" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                    <input name="ctrlNum" type="text" value="<?php echo e($data->controlNumber); ?>" style="display: none">
                                </form>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kylepc/MEGAsync/Web Projects/pinakalatest/Web-Project/resources/views/transactions/unclaimed.blade.php ENDPATH**/ ?>