<!DOCTYPE html>
<html lang="en">

@include('fronted.head')
<body>
<!--in ra customer_id và shipping_id -->
{{--<!-- <?php--}}
{{--echo Session::get('customer_id');--}}
{{--echo Session::get('shipping_id');--}}
{{--?> -->--}}

    <!--[if lt IE 8]-->
{{--    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>--}}
{{--    <![endif]-->--}}
      <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
            @include('fronted.header')
        <!-- Header Area End Here -->
        <!-- Begin Slider With Category Menu Area -->

        <div class="slider-with-banner">
            <div class="container">
                <div class="row">
                    <!-- Begin Category Menu Area -->
                    <div class="col-lg-3">
                        <!--Category Menu Start-->
                        @include('fronted.menu')
                        <!--Category Menu End-->
                    </div>
                    <!-- Category Menu Area End Here -->
                    <!-- Begin Slider Area -->
                    <div class="col-lg-6 col-md-8">
                        @include('fronted.slide')
                    </div>
                    <!-- Slider Area End Here -->
                    <!-- Begin Li Banner Area -->
                    <div class="col-lg-3 col-md-4 text-center pt-sm-30">
                        <div class="li-banner">
                            <a href="#">
                                <img style="height: 220px" src="{{asset('public/frontend/images/banner/banner_slide_img_1.jpg')}}" alt="">
                            </a>
                        </div>
                        <div class="li-banner mt-15 mt-sm-30 mt-xs-25 mb-xs-5">
                            <a href="#">
                                <img style="height: 220px" src="{{asset('public/frontend/images/banner/banner_slide_img_2.jpg')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                </div>
            </div>
        </div>
        <!-- Begin Li's Static content Area -->
             @yield("main_content")
       <!-- content Shipping Area End Here -->
        <!-- Begin Footer Area -->
             @include('fronted.footer')
        <!-- Footer Shipping Area End Here -->
   </div>
             @include('fronted.script')
</body>

</html>




