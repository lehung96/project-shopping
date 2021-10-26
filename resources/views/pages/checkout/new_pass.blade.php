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
                    {{--                    <h5>Điền Email để lấy lại mật khẩu</h5>--}}

                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {!! session()->get('message')!!}
                        </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger">
                            {!! session()->get('error')!!}
                        </div>
                    @endif
                    @php
                    $token = $_GET['token'];
                    $email = $_GET['email']
                    @endphp

                    <form action="{{URL::to('/reset-new-pass')}}" method="POST">
                        @csrf
                        <div class="login-form" >
                            <h4 class="login-title ">Điền mật khẩu mới</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    {{--                                    <label>Tên đăng nhập/Email</label>--}}
                                    <input class="mb-0" type="hidden" name="email"  value="{{$email}}"/>
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    {{--                                    <label>Tên đăng nhập/Email</label>--}}
                                    <input class="mb-0" type="hidden" name="token"  value="{{$token}}"/>
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    {{--                                    <label>Tên đăng nhập/Email</label>--}}
                                    <input class="mb-0" type="text" name="password_account"  placeholder="Nhập mật khẩu mới...">
                                </div>

                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                    {{--                                    <a href="#"> Forgotten pasward?</a>--}}
                                </div>

                                <button  style="margin-top: 5px;" class="register-button mt-0 ">Gửi</button>

                                {{--                                <div class="social-auth-links text-center mb-3 offset-3">--}}
                                {{--                                    <h5 style="padding-top: 10px"><li class=""><a href="{{URL::to('/quen-mat-khau')}}">Quên mật khẩu?</a></li></h5>--}}
                                {{--                                    <h5 style="padding-top: 10px"><li class=""><a href="{{URL::to('/dang-ky')}}">Đăng ký</a></li></h5>--}}
                                {{--                                </div>--}}

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








