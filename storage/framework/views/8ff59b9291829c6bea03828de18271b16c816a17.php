<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('fronted.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
<?php echo $__env->make('fronted.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Quên mật khẩu</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 offset-3">
                    <!-- Login Form s-->
                    <!-- gửi một form đến login-customer URL::to('/login-customer') -->


                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-success">
                            <?php echo session()->get('message'); ?>

                        </div>
                    <?php elseif(session()->has('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo session()->get('error'); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(URL::to('/recovery-pass')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                        <div class="login-form" >
                            <h4 class="login-title ">Điền Email để lấy lại mật khẩu</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    
                                    <input class="mb-0" type="email" name="email_account"  placeholder="Nhập Email">
                                </div>

                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                    
                                </div>

                                    <button  style="margin-top: 5px;" class="register-button mt-0 ">Gửi Email</button>






                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->
<?php echo $__env->make('fronted.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Footer Shipping Area End Here -->
</div>
<?php echo $__env->make('fronted.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>







<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/checkout/forget_pass.blade.php ENDPATH**/ ?>