<?php if(Auth::check() && Auth::user()->username === "administrator"): ?>
<?php echo e(session(['already' => 'Anda sudah melakukan login sebagai administrator'])); ?>

<script>
    window.location="<?php echo e(route('dashboard.evoush')); ?>"
</script>
<?php endif; ?>

<?php $__env->startSection('title'); ?> Evoush::Administrator | Login::Page <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="login">
    

    <div class="row justify-content-center">
        
        <h1 class="header-text" style="font-family: 'Walkway';">Administrator Login</h1>
        <blockquote class="blockquote-footer">
            <span class="text-danger">evoush</span> website management content
        </blockquote>
    </div>

    <?php if(session('status')): ?>
    <div class="alert alert-success">
     <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo csrf_field(); ?>

                    

                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Username')); ?></label>

                        <div class="col-md-8">
                            <input id="username" type="text" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="username" value="<?php echo e(old('username')); ?>" required autocomplete="esername" autofocus>

                            <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong>Oops ! terjadi kesalahan dalam proses login.<br/><?php echo e($message); ?> Hubungi pihak Administrator
                                </strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Password')); ?></label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password">

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e('Password yang anda inputkan salah'.$message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div id="show-password" class="show" v-on:click="showPassword">
                                <div v-if="showing === false">
                                    <span v-html="show"></span> Show
                                </div>
                                <div v-else>
                                    <span v-html="hide"></span> Hide
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                <label class="form-check-label" for="remember">
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <button type="submit" class="btn btn-block btn-hover color-4">
                                <?php echo e(__('Login')); ?>

                            </button>

                            <a @click="historyBack()" class="btn btn-hover color-1 btn-block mt-2 back-btn">Back</a>
                           

                            <?php if(Route::has('password.request')): ?>
                            <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                <?php echo e(__('Forgot Your Password?')); ?>

                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </form>

            </div>

            <style type="text/css">
                .login-page{
                    margin-top: 1rem!important;
                }
                #login-page {
                    background: rgba(255, 255, 255, 0.5);
                }
                .show {
                    cursor: pointer;
                    font-size: 16px!important;
                    margin-top: 1.3rem!important;
                }

                .header-text{
                    background: -webkit-linear-gradient(#eee, #333);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: transparent;
                }

                /*button*/
                .btn-hover {
                    width: 100%;
                    font-size: 16px;
                    font-weight: 600;
                    color: #fff;
                    cursor: pointer;
                    margin: 20px;
                    height: 35px;
                    text-align:center;
                    border: none;
                    background-size: 300% 100%;

                    border-radius: 50px;
                    moz-transition: all .4s ease-in-out;
                    -o-transition: all .4s ease-in-out;
                    -webkit-transition: all .4s ease-in-out;
                    transition: all .4s ease-in-out;
                }

                .btn-hover:hover {
                    background-position: 100% 0;
                    moz-transition: all .4s ease-in-out;
                    -o-transition: all .4s ease-in-out;
                    -webkit-transition: all .4s ease-in-out;
                    transition: all .4s ease-in-out;
                }

                .btn-hover:focus {
                    outline: none;
                }
                .btn-hover.color-1 {
                    background-image: linear-gradient(to right, #25aae1, #40e495, #30dd8a, #2bb673);
                    box-shadow: 0 4px 15px 0 rgba(49, 196, 190, 0.75);
                }
                .btn-hover.color-4 {
                    background-image: linear-gradient(to right, #fc6076, #ff9a44, #ef9d43, #e75516);
                    box-shadow: 0 4px 15px 0 rgba(252, 104, 110, 0.75);
                }
                .back-btn{
                    margin-bottom: 15rem!important;
                }
                /*end button*/
                @media (min-width: 992px) {
                    .back-btn{
                        margin-bottom: 0;
                    }
                }
            </style>

            <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Evoush\puji_titip\evoush-backend\resources\views/auth/login.blade.php ENDPATH**/ ?>