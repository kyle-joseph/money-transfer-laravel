<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register</title>

        <link href="<?php echo e(asset('css/demoStyle.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/login.css')); ?>" rel="stylesheet">

	    <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/3382ceab91.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
        <div class="wrap">
            <div class="container">
                <div class="banner">
                    <div class="banner-title"><h1>Register A User</h1></div>
                    <div class="overlay"></div>
                </div>
                <div class="login-form">
                    <div class="content2">
                        <div class="login">
                            <h1>REGISTER</h1>
                        </div>
                        <form action="<?php echo e(route('register')); ?>" onsubmit="return loginValidation()" method="POST">
                            <?php echo csrf_field(); ?>   
                            <div class="log">
                                <div class="form center">
                                    <input id="username"type="text" name="username" autofocus autocomplete="off" placeholder=" ">
                                    <label for="name" class="label-name">
                                        <span class="content-name">Username</span>
                                    </label>
                                </div><br>
                                <div class="form center">
                                    <input id="password"type="password" name="password" autofocus autocomplete="off" placeholder=" ">
                                    <label for="name" class="label-name">
                                        <span class="content-name">Password</span>
                                    </label>
                                </div><br>
                                <div class="form center">
                                    <input id="password-confirm"type="password" name="password_confirmation" autofocus autocomplete="off" placeholder=" ">
                                    <label for="name" class="label-name">
                                        <span class="content-name">Confirm Password</span>
                                    </label>
                                </div><br>
                                <input  type="submit" value="REGISTER">
                                <?php if($errors->any()): ?>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <h4><?php echo e($error); ?></h4>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo e(asset('js/login.js')); ?>""></script>
    </body>
</html>
<?php /**PATH /home/kylepc/MEGAsync/Web-Project/resources/views/auth/register.blade.php ENDPATH**/ ?>