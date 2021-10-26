<!DOCTYPE html>
<html lang="en">

@include('fronted.head')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
    @include('fronted.header')
<!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Đăng Nhập</li>
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
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {!! session()->get('success')!!}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {!! session()->get('error')!!}
                        </div>
                @endif
                    <!-- gửi một form đến login-customer URL::to('/login-customer') -->
                    <form action="{{URL::to('/login-customer')}}" method="POST">
                        {{csrf_field()}}
                        <div class="login-form">
                            <h4 class="login-title offset-3">Đăng Nhập tài khoản</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
{{--                                    <label>Tên đăng nhập/Email</label>--}}
                                    <input class="mb-0" type="email" name="email_account"  placeholder="Tên đăng nhập/Email">
                                </div>
                                <div class="col-12 mb-20">
{{--                                    <label>Password</label>--}}
                                    <input class="mb-0" type="password" name="password_account" placeholder="Mật Khẩu ">
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Nhớ mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
{{--                                    <a href="#"> Forgotten pasward?</a>--}}
                                </div>
                                <div class="col-md-12 offset-3" style="padding-top: 15px;padding-left:40px">
                                    <button  class="register-button mt-0 ">Đăng Nhập</button>
                                </div>
                                <div class="social-auth-links text-center mb-3 offset-3">
                                    <p style="padding-top: 10px">Hoặc đăng nhập bằng</p>
                                    <a href="#" class="btn btn-block btn-primary">
                                        <i class="fa fa-facebook mr-2"></i>Đăng nhập bằng Facebook
                                    </a>
{{--                                    <a href="#" class="btn btn-block btn-danger">--}}
{{--                                        <i class="fa fa-google mr-2"></i> Sign in using Google--}}
{{--                                    </a>--}}
                                </div>
                                <div class="social-auth-links text-center mb-3 offset-3">
                                    <h5 style="padding-top: 10px"><li class=""><a href="{{URL::to('/quen-mat-khau')}}">Quên mật khẩu?</a></li></h5>
                                    <h5 style="padding-top: 10px"><li class=""><a href="{{URL::to('/dang-ky')}}">Đăng ký</a></li></h5>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->
@include('fronted.footer')
<!-- Footer Shipping Area End Here -->
</div>
@include('fronted.script')
</body>

</html>






