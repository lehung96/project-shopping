<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('public/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/adminlte/dist/css/adminlte.min.css')}}">
    <script src="js/jquery2.0.3.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b> Đăng ký auth </b>Admin</a>
    </div>
    <?php
    $message = Session::get('message');
    if($message){
        echo '<span style="color: red; font-size: 20px" class="text-alert">'.$message.'</span>';
        Session::put('message',null);
    }
    ?>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"></p>


            {{--Khi click vào đăng ký thì mặc định dữ liệu gửi vào form register theo phương
             thước post--}}
            <form action="{{URL::to('/register')}}" method="post">
                {{ csrf_field() }}{{--//  {{csrf_field()}} giúp bảo mật khi chúng ta gửi dữ liệu từ form lên--}}
{{--                @foreach($errors->all() as $val)--}}
{{--                    <ul>--}}
{{--                        <li>{{$val}}</li>--}}
{{--                    </ul>--}}
{{--                @endforeach--}}
                <div class="input-group mb-3">
                    <input type="text"  class="form-control ggg @error('admin_name') is-invalid @enderror" name="admin_name" value="{{old('admin_name')}}" placeholder="Điền Name" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user-alt"></span>
                        </div>
                    </div>
                    @error('admin_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="text"  class="form-control ggg @error('admin_email') is-invalid @enderror" name="admin_email" placeholder="Điền Email" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('admin_email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                                                                 {{--value="{{old('admin_phone')}}" là để lại dữ liệu cũ khi đăng nhập--}}
                    <input type="text"  class="form-control ggg @error('admin_phone') is-invalid @enderror" name="admin_phone" value="{{old('admin_phone')}}" placeholder="Điền Phone" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                    @error('admin_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class=" form-control ggg @error('admin_password') is-invalid @enderror" name="admin_password" placeholder="Điền password" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('admin_password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <input type="submit" value="Đăng ký" name="login"  class="btn btn-primary btn-block">
{{--                        <button type="submit" name="submit" class="btn btn-primary btn-block">Đăng Ký Auth</button>--}}
                    </div>
                    <!-- /.col -->
                </div>
            </form>

{{--            <div class="social-auth-links text-center mb-3">--}}
{{--                <p>- OR -</p>--}}
{{--                <a href="#" class="btn btn-block btn-primary">--}}
{{--                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
{{--                </a>--}}
{{--                <a href="#" class="btn btn-block btn-danger">--}}
{{--                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
{{--                </a>--}}
{{--            </div>--}}

            <!-- /.social-auth-links -->

{{--            <p class="mb-1">--}}
{{--                <a href="forgot-password.html">I forgot my password</a>--}}
{{--            </p>--}}
{{--            <p class="mb-0">--}}
{{--                <a href="register.html" class="text-center">Register a new membership</a>--}}
{{--            </p>--}}
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('public/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<link rel="stylesheet" href="{{asset('public/adminlte/dist/css/adminlte.min.css')}}">
</body>
</html>

