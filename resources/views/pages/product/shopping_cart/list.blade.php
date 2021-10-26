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
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Shopping Cart Area Strat-->
    <div class="Shopping-cart-area pt-60 pb-60">
        <div class="container">
            <div class="row">
                <!--id="list-cart" thêm vào để -->
                <div class="col-12" id="list-cart">
                    @include('pages.product.shopping_cart.list_cart')
                </div>
            </div>
        </div>
    </div>
@include('fronted.footer')
<!-- Footer Shipping Area End Here -->
</div>
@include('fronted.script')
</body>

</html>





