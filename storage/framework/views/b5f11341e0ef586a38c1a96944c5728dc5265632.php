
<?php $__env->startSection('title', 'Send Money'); ?>
<?php $__env->startSection('header', 'Send'); ?>
<?php $__env->startSection('content'); ?>

    <div class="content"> 
        <div class="progress">
            <div class="progress-content card">
                <div class="details">
                    <ul>
                        <li class="current">Payment Details</li>
                        <li>Sender Details</li>
                        <li>Recipient Details</li>
                        <li>Transaction Summary</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="send">
            <div class="send-form card">
                <form action="/send" method="POST" onkeydown="return event.key != 'Enter';">
                    <?php echo csrf_field(); ?>
                <div class="sendtab">
                    <div class="title">
                        <h2>Payment Details</h2><br>
                        <p>Please enter the following details below</p>
                    </div><br>
                    <div class="form center">
                        <input type="text" name="amount" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Enter Amount to Send</span>
                        </label>
                    </div>
                </div>

                
                <div class="sendtab">
                    <div class="title">
                        <h2>Sender Details</h2><br>
                        <p>Please enter full legal name as it appears on a valid ID. Misspellings or use of nicknames may cause delays. Enter N/A for fields that has no data to input.</p>
                    </div><br>
                    <div class="form center">
                        <input type="text" name="sfname" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Firstname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="smname" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Middlename (Optional)</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="slname" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Lastname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="snumber" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Contact Number</span>
                        </label>
                    </div><br><br>
                    <div class="title">
                        <h2>Sender Address</h2><br>
                        <p>Please enter your current home address. Misspellings or abbreviations may cause delays.</p>
                    </div><br>
                    <div class="form center">
                        <input type="text" name="sbrgy" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Barangay</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="scity" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">City/Municipality</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="sprov" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Province</span>
                        </label>
                    </div>
                </div></br>

                <!-- Recipient -->
                <div class="sendtab">
                    <div class="title">
                        <h2>Recipient Details</h2><br>
                        <p>Please enter full legal name as it appears on a valid ID. Misspellings or use of nicknames may cause delays. Enter N/A for fields that has no data to input.</p>
                    </div><br>
                    <div class="form center">
                        <input type="text" name="rfname" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Firstname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rmname" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Middlename (Optional)</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rlname" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Lastname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rnumber" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Contact Number</span>
                        </label>
                    </div><br><br>
                    <div class="title">
                        <h2>Recipient Address</h2><br>
                        <p>Please enter your current home address. Misspellings or abbreviations may cause delays.</p>
                    </div><br>
                    <div class="form center">
                        <input type="text" name="rbrgy" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Barangay</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rcity" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">City/Municipality</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rprov" autocomplete="off" placeholder=" ">
                        <label for="name" class="label-name">
                            <span class="content-name">Province</span>
                        </label>
                    </div>
                </div>

                
                <div class="sendtab">
                    <div class="title">
                        <h1>Transaction Summary</h1>
                    </div><hr><br>
                    <div class="summary title">
                        <h2>Sender</h2><br>
                        <ul class="sendSummary">
                            <li class="info"></li>
                            <li class="info"></li>
                            <li class="info"></li>
                        </ul>
                        <h2>Recipient</h2><br>
                        <ul class="recSummary">
                            <li class="info"></li>
                            <li class="info"></li>
                            <li class="info"></li>
                        </ul>
                        <h2>Amount</h2><br>
                        <ul class="amountSummary">
                            <li class="info"></li>
                        </ul>

                    </div>
                </div>
                <br>
                <div class="step-btn">
                    <button class="prevBtn" type="button">Previous</button>
                    <button class="nextBtn" type="button">Next</button>
                    <input  type="submit" value="Submit">
                </div>
            </form>
            </div>
        </div>
        
    </div> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kylepc/MEGAsync/Web Projects/pinakalatest/Web-Project/resources/views/pages/send.blade.php ENDPATH**/ ?>