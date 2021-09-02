<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- Scripts -->
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
     
    <link rel="shortcut icon" href="https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/logo/fav_evoush.png">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/auth.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('dashboard/css/sb-admin-2.min.css')); ?>">
</head>
<body class="bg-gradient-primary">

    
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-10 col-lg-12 col-md-9 mt-3">

                <div class="card o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6  bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <?php echo $__env->yieldContent('content'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<style type="text/css">
.login-card{
    border-radius: 50%!important;
}
.card{
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.70)!important;
    border-radius: 2%;
    margin-top: 2rem!important;
    height: 80%!important;
}

  @media (min-width: 992px) {
    .card{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.70)!important;
        border-radius: 2%;
        margin-top: 7rem!important;
        height: 60%!important;
    }
}

</style>

<!-- Bootstrap core JavaScript-->
    <script src="<?php echo e(asset('dashboard/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo e(asset('vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\Users\Evoush\puji_titip\evoush-backend\resources\views/layouts/auth/app.blade.php ENDPATH**/ ?>