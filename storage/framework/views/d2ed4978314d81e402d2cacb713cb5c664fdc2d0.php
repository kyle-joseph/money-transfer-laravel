<?php $__env->startSection('title', 'Transactions'); ?>
<?php $__env->startSection('header', 'Unclaimed Transactions'); ?>
<?php $__env->startSection('content'); ?>
<div class="content2">
    <div class="edit">
        <div class="edit-form">
            <form action="/transactions/unclaimed/edit/" id="edit-form" onsubmit="return editValidation()" method="POST">
                <?php echo csrf_field(); ?>
                <?php if($data): ?>
                    <div class="title">
                        <h2>Edit Transaction</h2><br>
                        <p>Please enter the following details below<br>Please put 'N/A' if you don't want to enter a value</p>
                    </div><br><br>
                    <div class="title">
                        <h3>Sender Details</h3>
                    </div>
                    <div class="form center">
                    <input type="text" name="sfname" autocomplete="off" placeholder=" " value="<?php echo e($data['senderFirstName']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Firstname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="slname" autocomplete="off" placeholder=" " value="<?php echo e($data['senderLastName']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Lastname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="snumber" autocomplete="off" placeholder=" " value="<?php echo e($data['senderNumber']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Contact Number</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="sbrgy" autocomplete="off" placeholder=" " value="<?php echo e($data['sbarangay']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Barangay</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="scity" autocomplete="off" placeholder=" " value="<?php echo e($data['scityMun']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">City/Municipality</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="sprov" autocomplete="off" placeholder=" " value="<?php echo e($data['sprovince']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Province</span>
                        </label>
                    </div><br>
                    <div class="title">
                        <h3>Recipient Details</h3>
                    </div>
                    <div class="form center">
                        <input type="text" name="rfname" autocomplete="off" placeholder=" " value="<?php echo e($data['recipientFirstName']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Firstname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rlname" autocomplete="off" placeholder=" " value="<?php echo e($data['recipientLastName']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Lastname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rnumber" autocomplete="off" placeholder=" " value="<?php echo e($data['recipientNumber']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Contact Number</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rbrgy" autocomplete="off" placeholder=" " value="<?php echo e($data['rbarangay']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Barangay</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rcity" autocomplete="off" placeholder=" " value="<?php echo e($data['rcityMun']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">City/Municipality</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rprov" autocomplete="off" placeholder=" " value="<?php echo e($data['rprovince']); ?>">
                        <label for="name" class="label-name">
                            <span class="content-name">Province</span>
                        </label>
                    </div>
                <input type="text" name="currentId" value="<?php echo e($data['currentId']); ?>" style="display: none" >
                <a href="/transactions/unclaimed"><input type="button" value="Cancel"></a>
                <input type="submit" value="Save">
                </form>
                
            <?php endif; ?>
            
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kylepc/MEGAsync/pinakalatest/Web-Project/resources/views/transactions/edit.blade.php ENDPATH**/ ?>