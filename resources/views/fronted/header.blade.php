<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span class="fa fa-headphones"> Hotline: </span><a href="#"> 0 123 321 345</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <!-- Begin Setting Area -->

                            <li>

                                <div class="ht-currency-trigger">
                                    <a href="#" style="color: black"><span class="fa fa-map-marker"> Địa điểm các cửa hàng </span></a>
                                </div>
                            </li>
                            <?php
                             //Khi mà đăng ký mình sẽ có customer_id hoặc đăng nhập cũng có customer_id,
                            // mình đặt vào một cái session
                            $customer_id = Session::get('customer_id');
                            //nếu $customer_id khác rỗng ( tồn tại customer_id) thì mình sẽ đăng xuất( nếu có đăng ký rồi thì sẽ là đăng xuất )
                            if($customer_id!=NULL){
                            ?>
                            <li>
{{--                                <div class="ht-currency-trigger">--}}
                                    <a href="{{URL::to('/logout-checkout')}}" style="color: black"><span class="  account fa fa-user"> Đăng xuất </span></a>
{{--                                </div>--}}
                                    <li><a href="{{URL::to('/history')}}"><span class="fa fa-history"> Lịch sử mua hàng</span></a></li>
                            </li>

                            <?php
                            }else{// ngược lại sẽ đănh nhập
                            ?>
                            <li>
{{--                                <div class="ht-currency-trigger">--}}
                                    <a href="{{URL::to('/login-checkout')}}" style="color: black"><span class=" account fa fa-user"> Đăng nhập </span></a>
{{--                                </div>--}}
                            </li>
                            <?php
                            }
                            ?>

                            <!-- Setting Area End Here -->
                            <!-- Begin Language Area -->
{{--                            <li>--}}
{{--                                <span class="language-selector-wrapper">Chọn ngôn ngữ :</span>--}}
{{--                                <div class="ht-language-trigger"><span>Việt</span></div>--}}
{{--                                <div class="language ht-language">--}}
{{--                                    <ul class="ht-setting-list">--}}
{{--                                        <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">Việt--}}
{{--                                            </a></li>--}}
{{--                                        <li><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">Anh</a></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="{{asset('public/frontend/images/menu/logo/1.jpg')}}" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <!-- action gửi đến tìm kiếm , phương thức post -->
{{--                    @if(session()->has('success_message'))--}}
{{--                            <div class="alert alert-success">--}}
{{--                                {{ session()->get('success_message') }}--}}
{{--                            </div>--}}
{{--                    @endif--}}
{{--                    @if(count($errors)>0)--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach($errors->all() as $error)--}}
{{--                                    <li>{{$error}}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
                    <form action="{{ route('search') }}" autocomplete="off" method="POST" class="hm-searchbox">
                        {{csrf_field()}}
                        <select class="nice-select select-search-category" name="searh_category_id">
                            <option value="0">Chọn danh mục</option>
                            {!! $htmlOption !!}
                        </select>
                        <input type="text" name="search_key" id="keywords" placeholder="Tìm kiếm sản phẩm ...">
                        <div id="search_ajax"></div>
                        <button class="li-btn"  name="search_items" type="submit" ><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="wishlist.html">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                {{--                                    <span class="item-text">£80.00--}}
                                <!-- kiểm tra nếu giỏ hàng khác null
                                        thì mình sẽ gán tổng tiền và  số lương và  = cái này <span class="item-text">£80.00
                                            <span class="cart-item-count">2</span> </span>-->
                                    <!-- Nếu như giỏ hàng có sản phẩm thì nó lấy tổng tiền và số lượng
                                     has kiểm tra , get lấy giá trị -->
                                    @if(Session::has('cart') != null )
                                        {{-- thêm id id="total-quanty-show" vào --}}

                                            <?php $total_price = $total_quantity = 0; ?>
                                            @foreach(Session::get('cart')->items as  $value)
                                                <?php
                                                $total_price += ($value['item']->price * $value['quanty']);
                                                $total_quantity += $value['quanty'];
                                                ?>
                                            @endforeach
                                        <div id="total-quanty-show">
                                            <span  class="item-text">{{number_format($total_price)}} vnđ
                                                {{-- hiển thị số lượng = quanty trong giỏ hàng trỏ tới số lượng trong giỏ hàng   --}}
                                                <span class="cart-item-count">{{$total_quantity}}</span>
                                            </span>
                                        </div>

                                    <!-- còn ngược lại =0  -->
                                    @else
                                        <div id="total-quanty-show">
                                            <span  class="item-text">0 vnđ
                                                {{-- hiển thị số lượng = quanty trong giỏ hàng trỏ tới số lượng trong giỏ hàng   --}}
                                                <span class="cart-item-count">0</span>
                                            </span>
                                        </div>
                                    @endif

                                    {{--                                    </span>--}}
                                </div>
{{--                                <span></span>--}}
                                <div class="minicart">
                                    <div id="change-item-cart">
                                        @include('pages.product.shopping_cart.cart')
                                    </div>
                                    <div class="minicart-button">
                                        <a href="{{route('shopping-list-cart')}}"
                                           class="li-button li-button-fullwidth li-button-dark">
                                            <span>Xem chi tiết giỏ hàng </span>
                                        </a>
                            <?php
                            //Khi mà đăng ký mình sẽ có customer_id hoặc đăng nhập cũng có customer_id,
                            // mình đặt vào một cái session
                            $customer_id = Session::get('customer_id');
                            //nếu tồn $customer_id thì sẽ đến trang checkout ( nếu có đăng ký rồi thì sẽ là thanh toán luôn )
                            if($customer_id!=NULL){
                            ?>
                                        <a href="{{URL::to('/checkout')}}" class="li-button li-button-fullwidth">
                                            <span>Thanh Toán</span>
                                        </a>

                            <?php
                            }else{// ngược lại sẽ đănh nhập
                            ?>
                                        <a href="{{URL::to('/login-checkout')}}" class="li-button li-button-fullwidth">
                                            <span>Thanh Toán</span>
                                        </a>
                            <?php
                            }
                            ?>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
{{--                        <nav>--}}
{{--                            <ul>--}}
{{--                                <li class="dropdown-holder"><a href="{{ route('home') }}">TRANG CHỦ</a>--}}
{{--                                </li>--}}
{{--                                <!--vòng lặp đầu tiên mình lấy ra được menu gốc -->--}}
{{--                                @foreach(  $menusLimit as  $menuParent)--}}
{{--                                    <li class="dropdown-holder"><a--}}
{{--                                            href="blog-left-sidebar.html"> {{ $menuParent->name }}</a>--}}
{{--                                        @include('fronted.child_menu', ['menuParent' => $menuParent])--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </nav>--}}

                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="{{ route('home') }}">Trang Chủ</a>
                                </li>
                                <li class="dropdown-holder"><a href="blog-left-sidebar.html">Blog </a>
                                    <ul class="hb-dropdown">
                                        <li class="sub-dropdown-holder"><a href="blog-left-sidebar.html">Chăm sóc sức khỏe</a></li>
                                        <li class="sub-dropdown-holder"><a href="blog-list-left-sidebar.html">kinh nghiệm nấu ăn</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-holder"><a href="blog-left-sidebar.html">Video & Hình ảnh </a>
                                    <ul class="hb-dropdown">
                                        <li class="sub-dropdown-holder"><a href="blog-left-sidebar.html">Video review sản phẩm</a></li>
                                        <li class="sub-dropdown-holder"><a href="blog-list-left-sidebar.html">Hình ảnh lắp đặt</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-holder"><a href="blog-left-sidebar.html">Tin tức </a>

                                    <ul class="hb-dropdown">
                                        @foreach($category_post as $key => $danhmucbaiviet)
                                            <li><a href="{{URL::to('/danh-muc-bai-viet/'.$danhmucbaiviet->cate_post_slug)}}">{{$danhmucbaiviet->cate_post_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="about-us.html">Khuyến mãi</a></li>
                                <li><a href="contact.html">giới thiệu </a></li>
                                <li><a href="shop-left-sidebar.html">Liên Hệ</a></li>
                                <li><a href="shop-left-sidebar.html">Góc tư vấn</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
<!-- Header Area End Here -->
