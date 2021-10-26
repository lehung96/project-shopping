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
                    <li class="active"> Đăng ký</li>
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
                    <form action="{{URL::to('/add-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="login-form ">
                            <h4 class="login-title">Đăng ký</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    {{--                                    <label>Nhập Họ Tên</label>--}}
                                    <input class="mb-0 @error('customer_name') is-invalid @enderror" type="text" name="customer_name"  placeholder="Nhập Họ Tên"
                                           value="{{ old('customer_name') }}">
                                    @error('customer_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    {{--                                    <label>Last Name</label>--}}
                                    <input class="mb-0 @error('customer_phone') is-invalid @enderror" type="text" name="customer_phone" placeholder="Nhập số điện thoại"
                                           value="{{ old('customer_phone') }}">
                                    @error('customer_phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    {{--                                    <label>Email Address*</label>--}}
                                    <input class="mb-0 @error('customer_email') is-invalid @enderror" type="email" name="customer_email" placeholder="Nhập Email "
                                           value="{{ old('customer_email') }}">
                                    @error('customer_email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 col-12 mb-20">
                                    {{--                                    <label>Password</label>--}}
                                    <input class="mb-0 @error('customer_password') is-invalid @enderror" type="password"  name="customer_password" placeholder="Mật khẩu"
                                           value="{{ old('customer_password') }}">
                                    @error('customer_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{--                                <div class="col-md-6 mb-20">--}}
                                {{--                                    <label>Confirm Password</label>--}}
                                {{--                                    <input class="mb-0" type="password" placeholder="Xác Nhận Mật khẩu">--}}
                                {{--                                </div>--}}
                                <div class="col-12">
                                    <button type="submit" class="register-button mt-0 offset-3">Đăng ký</button>
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







