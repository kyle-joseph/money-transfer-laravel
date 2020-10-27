
<?php $__env->startSection('title', 'Claim Money'); ?>
<?php $__env->startSection('header', 'Claim'); ?>
<?php $__env->startSection('content'); ?>

    <div class="content2">
        <div class="search card">
            <div class="search-content">
                <form name="searchForm" action="/claim" onsubmit="return searchValidate()" method="GET" onkeydown="return event.key != 'Enter';">
                    <?php echo csrf_field(); ?>
                    <div class="search-form">
                        <div class="title">
                            <h2>Search Control Number</h2><br>
                        </div>
                        <div class="form center">
                            <input type="text" name="ctrlNum" autocomplete="off" placeholder=" ">
                            <label for="name" class="label-name">
                                <span class="content-name">Enter Control Number</span>
                            </label>
                        </div>
                    </div>
                    <div class="search-btn">
                        <input  type="submit" value="Search">
                    </div>
                    <div class="errorMsg">
                        <?php if(session()->has('msg')): ?>
                            <?php if(session()->get('msg') != 'Claim Successful'): ?>
                                <h1 style="color:#CA0221;"><i class="fas fa-exclamation-triangle"></i> <?php echo e(session()->get('msg')); ?></h1>
                            <?php else: ?>
                                <h1 style="color:#34B62B;"><i class="fas fa-check-double"></i> <?php echo e(session()->get('msg')); ?></h1>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="search-result">
            <div class="result">
                <div class="sender-result">
                    <div class="sender">
                        <div class="title">
                            <h1>Sender</h1>
                        </div><hr><br>
                        
                        <?php 
                            $data = null; 
                            $sender = null;
                            $recipient = null;
                            $sAddress = null;
                            $rAddress = null;
                            $transaction = null;
                        ?>
                        <?php if(session()->has('data')): ?>
                            <?php 
                                $data = session()->get('data'); 
                                $sender = $data['sender'][0];
                                $recipient = $data['recipient'][0];
                                $sAddress = $data['sAddress'][0];
                                $rAddress = $data['rAddress'][0];
                                $transaction = $data['transaction'][0];
                            ?>
                             <ul>
                                <li><?php echo e($sender->senderFirstName); ?> <?php echo e($sender->senderLastName); ?></li>
                                <li><?php echo e($sender->senderNumber); ?></li>
                                <li><?php echo e($sAddress->barangay); ?>, <?php echo e($sAddress->cityMun); ?>, <?php echo e($sAddress->province); ?></li>
                                <li>Amount: Php <?php echo e($transaction->amount); ?></li>
                                <li>Control Number: <?php echo e($transaction->controlNumber); ?></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="recipient-result">
                    <div class="recipient">
                        <div class="title">
                            <h1>Recipient</h1>
                        </div>
                        <hr><br>
                        <?php if(session()->has('data')): ?>
                            <ul>
                                <li><?php echo e($recipient->recipientFirstName); ?> <?php echo e($recipient->recipientLastName); ?></li>
                                <li><?php echo e($recipient->recipientNumber); ?></li>
                                <li><?php echo e($rAddress->barangay); ?>, <?php echo e($rAddress->cityMun); ?>, <?php echo e($rAddress->province); ?></li>
                            </ul>
                            <a href="/claim/<?php echo e($transaction->controlNumber); ?>"><input type="submit" value="Claim"></a>
                            <a href="/receive"><input type="submit" value="Cancel"></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kylepc/MEGAsync/pinakalatest/Web-Project/resources/views/pages/receive.blade.php ENDPATH**/ ?>