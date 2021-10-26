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
    <section id="cart_items">
        <div class="container">

            <div class="review-payment">
                <h2>Cảm ơn bạn đã đặt hàng ở chỗ chúng tôi,chúng tôi sẽ liên hệ với bạn sớm nhất</h2>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <!-- Login Content Area End Here -->
@include('fronted.footer')
<!-- Footer Shipping Area End Here -->
</div>
@include('fronted.script')
</body>

</html>








