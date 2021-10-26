<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('public/adminlte/plugins/fontawesome-free/css/all.min.css')); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('public/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('public/adminlte/dist/css/adminlte.min.css')); ?>">
    <script src="js/jquery2.0.3.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b> Đăng Nhập</b></a>
    </div>
<?php
$message = Session::get('message');
if($message){
    echo '<span style="color: red; font-size: 20px"  class="text-alert">'.$message.'</span>';
    Session::put('message',null);
}
?>
<!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"></p>


            
            <form action="<?php echo e(URL::to('/login')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                
                
                
                
                
                <div class="input-group mb-3">
                    <input type="text"  class="form-control ggg " name="admin_email" placeholder="Điền Email" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>



                </div>

                <div class="input-group mb-3">
                    <input type="password" class=" form-control ggg "  name="admin_password" placeholder="Điền password" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <input type="submit" value="Đăng nhập" name="login"  class="btn btn-primary btn-block">
                        
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- Hoặc -</p>






                <a href="<?php echo e(url('/register-auth')); ?>">Đăng ký Auth</a>
            </div>

            <!-- /.social-auth-links -->

            
            
            
            
            
            
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo e(asset('public/adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<link rel="stylesheet" href="<?php echo e(asset('public/adminlte/dist/css/adminlte.min.css')); ?>">
</body>
</html>

<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/custom_auth/login_auth.blade.php ENDPATH**/ ?>