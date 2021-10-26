@extends('fronted.layout')
@section('main_content')
    <!-- Begin Product Area -->
    <div class="product-area pt-60 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab"
                                   href="#li-new-product"><span>Sản Phẩm mới </span></a></li>
                            <li><a data-toggle="tab"
                                   href="#li-bestseller-product"><span>Top Sản phẩm bán chạy </span></a></li>
{{--                            <li><a data-toggle="tab" href="#li-featured-product"><span>Sản Phẩm nổi bật </span></a></li>--}}
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="li-new-product" class="tab-pane active show" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">

                            <!-- đổ dữ liệu sản phẩm mới nhất -->
                            @foreach($newProduct as $product)
                                <div class="col-lg-12">
                                    <!-- single-products-wrap start -->
                                    <div class="single-product-wrap">

                                        <div class="product-image">
                                            <a href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">
                                                <img class="product_image_206_206"
                                                     src="{{URL::to('public/uploads/products/'.$product->image)}}"
                                                     alt="Li's Product Image">
                                                {{--                                            {{('public/frontend/images/product/large-size/1.jpg')}}--}}
                                            </a>
                                            <!-- nếu giá khuyến mãi != 0
                                              tức là có giảm giá -->
                                            @if($product->new !=0)
                                                <span class="sticker">Sản phẩm mới về </span>
{{--                                            <span class="sticker"> -{{$product->promontion_price}}%</span>--}}
{{--                                                <span class="discount-percentage">-7%</span>--}}
                                            @endif
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">sunhouse</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name"
                                                       href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">{{ $product->product_name }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    @if($product->promontion_price ==0)
                                                        <span class="new-price">{{ number_format($product->price) }} đ</span>
                                                    @else
                                                        <span class="new-price new-price-2">{{number_format(((float)$product->price*(100-$product->promontion_price))/100)}} đ</span>
                                                        <span
                                                            class="old-price">{{ number_format($product->price) }} đ</span>
                                                        {{--                                                    <span class="discount-percentage">-7%</span>--}}
                                                        <span style="color: red"  class="discount-percentage">  -{{$product->promontion_price}}%</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active">
                                                        <!-- trong thẻ a mình thêm một thuộc tính nữa là data-url= -->
                                                        <!--  thuộc tính nữa là data-url= tên route name ở bên web.php -->
                                                        <!--  và truyền vào cái key, value key là  id = value là = cái product chỏ đên id['id'=>$product->product_id]  -->
                                                        <a onclick="add({{$product->product_id}})" href="javascript:">
                                                            Mua sản phẩm</a>
                                                    </li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="" title="Xem nhanh" class="quick-view-btn xemnhanh"
                                                           data-toggle="modal" data-target="#xemnhanh" data-id_product="{{$product->product_id}}">
                                                            <i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-products-wrap end -->
                                </div>
                        @endforeach
                        <!-- kết đổ dữ liệu sản phẩm mới nhất -->
                        </div>
                    </div>
                </div>
                <div id="li-bestseller-product" class="tab-pane" role="tabpanel">
                    <div class="row">
                        <div class="product-active owl-carousel">
                            <!-- đổ dữ liệu sản phẩm bán chạy nhất  -->

                            <!--  giá biến $keyRecommend  Sẽ bắt đầu từ 0   -->
                            <!-- khi  $keyRecommend  = 4 thì sẽ lặp ra 5 sản phẩm  -->
                            <!-- số sản phẩm sẽ lớn hơn số $keyRecommend một đơn vị  -->
                            <!-- khi  $keyRecommend = 0 ra sản phẩm số 1 tương tự các trường hợp   -->
                            @foreach($productsRecommend as $keyRecommend => $productsRecommendItem )
                                <div class="col-lg-12">
                                    <!-- single-products-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img class="product_image_206_206"
                                                     src="{{URL::to('public/uploads/products/'.$productsRecommendItem->image)}}"
                                                     alt="Li's Product Image">
                                            </a>
{{--                                            <span class="sticker">New</span>--}}
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name"
                                                       href="single-product.html">{{$productsRecommendItem->product_name }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price">{{ number_format($productsRecommendItem->price) }}VNĐ</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                           data-toggle="modal" data-target="#slider-navigation-1"><i
                                                                class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-products-wrap end -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
{{--                <div id="li-featured-product" class="tab-pane" role="tabpanel">--}}
{{--                    <div class="row">--}}
{{--                        <div class="product-active owl-carousel">--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <!-- single-products-wrap start -->--}}
{{--                                <div class="single-product-wrap">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <a href="single-product.html">--}}
{{--                                            <img src="images/product/large-size/3.jpg" alt="Li's Product Image">--}}
{{--                                        </a>--}}
{{--                                        <span class="sticker">New</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_desc">--}}
{{--                                        <div class="product_desc_info">--}}
{{--                                            <div class="product-review">--}}
{{--                                                <h5 class="manufacturer">--}}
{{--                                                    <a href="shop-left-sidebar.html">Graphic Corner</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="rating-box">--}}
{{--                                                    <ul class="rating">--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <h4><a class="product_name" href="single-product.html">Accusantium--}}
{{--                                                    dolorem1</a></h4>--}}
{{--                                            <div class="price-box">--}}
{{--                                                <span class="new-price">$46.80</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-actions">--}}
{{--                                            <ul class="add-actions-link">--}}
{{--                                                <li class="add-cart active"><a href="#">Add to cart</a></li>--}}
{{--                                                <li><a class="links-details" href="wishlist.html"><i--}}
{{--                                                            class="fa fa-heart-o"></i></a></li>--}}
{{--                                                <li><a href="#" title="quick view" class="quick-view-btn"--}}
{{--                                                       data-toggle="modal" data-target="#exampleModalCenter"><i--}}
{{--                                                            class="fa fa-eye"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- single-products-wrap end -->--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <!-- single-products-wrap start -->--}}
{{--                                <div class="single-product-wrap">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <a href="single-product.html">--}}
{{--                                            <img src="images/product/large-size/5.jpg" alt="Li's Product Image">--}}
{{--                                        </a>--}}
{{--                                        <span class="sticker">New</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_desc">--}}
{{--                                        <div class="product_desc_info">--}}
{{--                                            <div class="product-review">--}}
{{--                                                <h5 class="manufacturer">--}}
{{--                                                    <a href="shop-left-sidebar.html">Studio Design</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="rating-box">--}}
{{--                                                    <ul class="rating">--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good--}}
{{--                                                    day</a></h4>--}}
{{--                                            <div class="price-box">--}}
{{--                                                <span class="new-price new-price-2">$71.80</span>--}}
{{--                                                <span class="old-price">$77.22</span>--}}
{{--                                                <span class="discount-percentage">-7%</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-actions">--}}
{{--                                            <ul class="add-actions-link">--}}
{{--                                                <li class="add-cart active"><a href="#">Add to cart</a></li>--}}
{{--                                                <li><a class="links-details" href="wishlist.html"><i--}}
{{--                                                            class="fa fa-heart-o"></i></a></li>--}}
{{--                                                <li><a href="#" title="quick view" class="quick-view-btn"--}}
{{--                                                       data-toggle="modal" data-target="#exampleModalCenter"><i--}}
{{--                                                            class="fa fa-eye"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- single-products-wrap end -->--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <!-- single-products-wrap start -->--}}
{{--                                <div class="single-product-wrap">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <a href="single-product.html">--}}
{{--                                            <img src="images/product/large-size/7.jpg" alt="Li's Product Image">--}}
{{--                                        </a>--}}
{{--                                        <span class="sticker">New</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_desc">--}}
{{--                                        <div class="product_desc_info">--}}
{{--                                            <div class="product-review">--}}
{{--                                                <h5 class="manufacturer">--}}
{{--                                                    <a href="shop-left-sidebar.html">Graphic Corner</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="rating-box">--}}
{{--                                                    <ul class="rating">--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <h4><a class="product_name" href="single-product.html">Accusantium--}}
{{--                                                    dolorem1</a></h4>--}}
{{--                                            <div class="price-box">--}}
{{--                                                <span class="new-price">$46.80</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-actions">--}}
{{--                                            <ul class="add-actions-link">--}}
{{--                                                <li class="add-cart active"><a href="#">Add to cart</a></li>--}}
{{--                                                <li><a class="links-details" href="wishlist.html"><i--}}
{{--                                                            class="fa fa-heart-o"></i></a></li>--}}
{{--                                                <li><a href="#" title="quick view" class="quick-view-btn"--}}
{{--                                                       data-toggle="modal" data-target="#exampleModalCenter"><i--}}
{{--                                                            class="fa fa-eye"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- single-products-wrap end -->--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <!-- single-products-wrap start -->--}}
{{--                                <div class="single-product-wrap">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <a href="single-product.html">--}}
{{--                                            <img src="images/product/large-size/9.jpg" alt="Li's Product Image">--}}
{{--                                        </a>--}}
{{--                                        <span class="sticker">New</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_desc">--}}
{{--                                        <div class="product_desc_info">--}}
{{--                                            <div class="product-review">--}}
{{--                                                <h5 class="manufacturer">--}}
{{--                                                    <a href="shop-left-sidebar.html">Studio Design</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="rating-box">--}}
{{--                                                    <ul class="rating">--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good--}}
{{--                                                    day</a></h4>--}}
{{--                                            <div class="price-box">--}}
{{--                                                <span class="new-price new-price-2">$71.80</span>--}}
{{--                                                <span class="old-price">$77.22</span>--}}
{{--                                                <span class="discount-percentage">-7%</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-actions">--}}
{{--                                            <ul class="add-actions-link">--}}
{{--                                                <li class="add-cart active"><a href="#">Add to cart</a></li>--}}
{{--                                                <li><a class="links-details" href="wishlist.html"><i--}}
{{--                                                            class="fa fa-heart-o"></i></a></li>--}}
{{--                                                <li><a href="#" title="quick view" class="quick-view-btn"--}}
{{--                                                       data-toggle="modal" data-target="#exampleModalCenter"><i--}}
{{--                                                            class="fa fa-eye"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- single-products-wrap end -->--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <!-- single-products-wrap start -->--}}
{{--                                <div class="single-product-wrap">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <a href="single-product.html">--}}
{{--                                            <img src="images/product/large-size/11.jpg" alt="Li's Product Image">--}}
{{--                                        </a>--}}
{{--                                        <span class="sticker">New</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_desc">--}}
{{--                                        <div class="product_desc_info">--}}
{{--                                            <div class="product-review">--}}
{{--                                                <h5 class="manufacturer">--}}
{{--                                                    <a href="shop-left-sidebar.html">Graphic Corner</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="rating-box">--}}
{{--                                                    <ul class="rating">--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <h4><a class="product_name" href="single-product.html">Accusantium--}}
{{--                                                    dolorem1</a></h4>--}}
{{--                                            <div class="price-box">--}}
{{--                                                <span class="new-price">$46.80</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-actions">--}}
{{--                                            <ul class="add-actions-link">--}}
{{--                                                <li class="add-cart active"><a href="#">Add to cart</a></li>--}}
{{--                                                <li><a class="links-details" href="wishlist.html"><i--}}
{{--                                                            class="fa fa-heart-o"></i></a></li>--}}
{{--                                                <li><a href="#" title="quick view" class="quick-view-btn"--}}
{{--                                                       data-toggle="modal" data-target="#exampleModalCenter"><i--}}
{{--                                                            class="fa fa-eye"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- single-products-wrap end -->--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-12">--}}
{{--                                <!-- single-products-wrap start -->--}}
{{--                                <div class="single-product-wrap">--}}
{{--                                    <div class="product-image">--}}
{{--                                        <a href="single-product.html">--}}
{{--                                            <img src="images/product/large-size/12.jpg" alt="Li's Product Image">--}}
{{--                                        </a>--}}
{{--                                        <span class="sticker">New</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="product_desc">--}}
{{--                                        <div class="product_desc_info">--}}
{{--                                            <div class="product-review">--}}
{{--                                                <h5 class="manufacturer">--}}
{{--                                                    <a href="shop-left-sidebar.html">Studio Design</a>--}}
{{--                                                </h5>--}}
{{--                                                <div class="rating-box">--}}
{{--                                                    <ul class="rating">--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                                    </ul>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <h4><a class="product_name" href="single-product.html">Mug Today is a good--}}
{{--                                                    day</a></h4>--}}
{{--                                            <div class="price-box">--}}
{{--                                                <span class="new-price new-price-2">$71.80</span>--}}
{{--                                                <span class="old-price">$77.22</span>--}}
{{--                                                <span class="discount-percentage">-7%</span>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="add-actions">--}}
{{--                                            <ul class="add-actions-link">--}}
{{--                                                <li class="add-cart active"><a href="#">Add to cart</a></li>--}}
{{--                                                <li><a class="links-details" href="wishlist.html"><i--}}
{{--                                                            class="fa fa-heart-o"></i></a></li>--}}
{{--                                                <li><a href="#" title="quick view" class="quick-view-btn"--}}
{{--                                                       data-toggle="modal" data-target="#exampleModalCenter"><i--}}
{{--                                                            class="fa fa-eye"></i></a></li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- single-products-wrap end -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
    <!-- Begin Li's Static Banner Area -->
    <div class="li-static-banner">
        <div class="container">
            <div class="row">
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4 text-center">
                    <div class="single-banner">
                        <a href="#">
                            <img src="{{('public/frontend/images/banner/banner_slide_img_3.jpg')}}" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                    <div class="single-banner">
                        <a href="#">
                            <img src="{{('public/frontend/images/banner/file-bai-dang-01.jpg')}}" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
                <!-- Begin Single Banner Area -->
                <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                    <div class="single-banner">
                        <a href="#">
                            <img src="{{('public/frontend/images/banner/slide_img_4.jpg')}}" alt="Li's Static Banner">
                        </a>
                    </div>
                </div>
                <!-- Single Banner Area End Here -->
            </div>
        </div>
    </div>
    <!-- Begin Li's Trendding Products Area -->
    <section class="product-area li-laptop-product li-trendding-products best-sellers pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>ĐỒ DÙNG NHÀ BẾP</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach($product_cate_kit as $product)
                                <div class="col-lg-12">
                                    <!-- single-products-wrap start -->
                                    <div class="single-product-wrap">

                                        <div class="product-image">
                                            <a  id="wishlist_producturl{{$product->product_id}}" href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">
                                                <img  class="product_image_206_206"
                                                      id="wishlist_productimage{{$product->product_id}}" src="{{URL::to('public/uploads/products/'.$product->image)}}"
                                                     alt="Li's Product Image">
                                                {{--                                            {{('public/frontend/images/product/large-size/1.jpg')}}--}}
                                            </a>
                                            <!-- nếu giá khuyến mãi != 0
                                              tức là có giảm giá -->
                                            @if($product->new !=0)
                                                <span class="sticker">Mới</span>
                                                {{--                                            <span class="sticker"> -{{$product->promontion_price}}%</span>--}}
                                                {{--                                                <span class="discount-percentage">-7%</span>--}}
                                            @endif
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">sunhouse</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a id="wishlist_productname{{$product->product_id}}" class="product_name"
                                                       id="wishlist_producturl{{$product->product_id}}" href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">{{ $product->product_name }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    @if($product->promontion_price ==0)
                                                        <span  id="wishlist_productprice{{$product->product_id}}"  class="new-price">{{ number_format($product->price) }} đ</span>
                                                    @else
                                                        <span class="new-price new-price-2">{{number_format(((float)$product->price*(100-$product->promontion_price))/100)}} đ</span>
                                                        <span
                                                            class="old-price">{{ number_format($product->price) }} đ</span>
                                                        {{--                                                    <span class="discount-percentage">-7%</span>--}}
                                                        <span style="color: red"  class="discount-percentage">  -{{$product->promontion_price}}%</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active">
                                                        <!-- trong thẻ a mình thêm một thuộc tính nữa là data-url= -->
                                                        <!--  thuộc tính nữa là data-url= tên route name ở bên web.php -->
                                                        <!--  và truyền vào cái key, value key là  id = value là = cái product chỏ đên id['id'=>$product->product_id]  -->
                                                        <a onclick="add({{$product->product_id}})" href="javascript:">
                                                            Mua sản phẩm</a>
                                                    </li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="" title="Xem nhanh" class="quick-view-btn xemnhanh"
                                                           data-toggle="modal" data-target="#xemnhanh" data-id_product="{{$product->product_id}}">
                                                            <i class="fa fa-eye"></i></a></li>
                                                </ul>

                                                    <ul class="nav nav-pills nav-justified">
                                                        <style type="text/css">

                                                            ul.nav.nav-pills.nav-justified li {
                                                                text-align: center;
                                                                font-size: 18px;
                                                            }
                                                            .button_wishlist{
                                                                border: none;
                                                                background: #ffff;
                                                                color: #B3AFA8;
                                                            }
                                                            ul.nav.nav-pills.nav-justified i {
                                                                color: #B3AFA8;
                                                            }
                                                            .button_wishlist span:hover {
                                                                color: #FE980F;
                                                            }

                                                            .button_wishlist:focus {
                                                                border: none;
                                                                outline: none;
                                                            }

                                                        </style>


                                                            <li>

                                                            <i class="fa fa-plus-square"></i>

                                                            <button class="button_wishlist" id="{{$product->product_id}}" onclick="add_wistlist(this.id);"><span>Yêu thích</span></button>

                                                        </li>

                                                        <li ><a href="javascript:" onclick="add_compare({{$product->product_id}})"><i class="fa fa-plus-square"></i> So sánh</a></li>
{{--                                                        <div class="container-fluid">--}}

{{--                                                        </div>--}}

                                                        <div class="container">

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="compare" role="dialog">
                                                                <div class="modal-dialog">

                                                                    <!-- Modal content-->
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            <h4 class="modal-title">Modal Header</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Some text in the modal.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </ul>

{{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-products-wrap end -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Trendding Products Area End Here -->
    <!-- Begin Li's Trending Product Area -->
    <section class="product-area li-laptop-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <!-- Hiển thị sản phẩm theo danh mục Hộp CƠM GIỮ NHIỆT  -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Máy Làm sữa hạt</span>
                        </h2>
                        <ul class="li-sub-category-list">
                            <li class="active"><a href="shop-left-sidebar.html">Prime Video</a></li>
                            <li><a href="shop-left-sidebar.html">Computers</a></li>
                            <li><a href="shop-left-sidebar.html">Electronics</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            <!--  -->
                            @foreach($product_cate_53 as $product)
                                <div class="col-lg-12">
                                    <!-- single-products-wrap start -->
                                    <div class="single-product-wrap">

                                        <div class="product-image">
                                            <a href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">
                                                <img class="product_image_206_206"
                                                     src="{{URL::to('public/uploads/products/'.$product->image)}}"
                                                     alt="Li's Product Image">
                                                {{--                                            {{('public/frontend/images/product/large-size/1.jpg')}}--}}
                                            </a>
                                            <!-- nếu giá khuyến mãi != 0
                                              tức là có giảm giá -->
                                            @if($product->new !=0)
                                                <span class="sticker">New</span>
                                                {{--                                            <span class="sticker"> -{{$product->promontion_price}}%</span>--}}
                                                {{--                                                <span class="discount-percentage">-7%</span>--}}
                                            @endif
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">sunhouse</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name"
                                                       href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">{{ $product->product_name }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    @if($product->promontion_price ==0)
                                                        <span class="new-price">{{ number_format($product->price) }} đ</span>
                                                    @else
                                                        <span class="new-price new-price-2">{{number_format(((float)$product->price*(100-$product->promontion_price))/100)}} đ</span>
                                                        <span
                                                            class="old-price">{{ number_format($product->price) }} đ</span>
                                                        {{--                                                    <span class="discount-percentage">-7%</span>--}}
                                                        <span style="color: red"  class="discount-percentage">  -{{$product->promontion_price}}%</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active">
                                                        <!-- trong thẻ a mình thêm một thuộc tính nữa là data-url= -->
                                                        <!--  thuộc tính nữa là data-url= tên route name ở bên web.php -->
                                                        <!--  và truyền vào cái key, value key là  id = value là = cái product chỏ đên id['id'=>$product->product_id]  -->
                                                        <a onclick="add({{$product->product_id}})" href="javascript:">
                                                            Mua sản phẩm</a>
                                                    </li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="" title="Xem nhanh" class="quick-view-btn xemnhanh"
                                                           data-toggle="modal" data-target="#xemnhanh" data-id_product="{{$product->product_id}}">
                                                            <i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-products-wrap end -->
                                </div>
                        @endforeach
                        <!--  -->
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Trending Product Area End Here -->

    <!-- Li's Static Banner Area End Here -->

    <!-- Begin Li's Static Home Area -->
    <!-- Begin Li's Main Blog Page Area -->
    <div class="li-main-blog-page pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Main Content Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Bài viết mới nhất</span>
                        </h2>
                    </div>
                    <div class="row li-main-content" style="margin-top: 22px;">
                        @foreach($post_new as $key => $p)
                            <div class="col-lg-4 col-md-6">
                                <div class="li-blog-single-item pb-25">
                                    <div class="li-blog-banner">
                                        <a href=""><img  style="width:80%;height: 200px"class="img-full" src="{{asset('public/uploads/post/'.$p->post_image)}}" alt=""></a>
                                    </div>
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h3 class="li-blog-heading pt-25"><a href="{{url('/bai-viet/'.$p->post_slug)}}" class="block-ellipsis">{{$p->post_title}}</a></h3>
                                            <div class="li-blog-meta">
                                                {{--                                                <a class="author" href="#"><i class="fa fa-user"></i>{{isset($article->User->name)?$article->User->name:'Admin'}}</a>--}}
                                                <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$p->created_at}}</a>
                                            </div>
                                            <p>{!!$p->post_desc!!}</p>
                                            <a class="read-more" href="{{url('/bai-viet/'.$p->post_slug)}}">Xem thêm...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Li's Main Content Area End Here -->
            </div>
        </div>
    </div>
    <!-- Li's Static Home Area End Here -->

    <!-- Begin Li's đồ vệ sinh làm sạch nhà catgory 26   Product Area -->
    <section class="product-area li-laptop-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <!-- Hiển thị sản phẩm theo danh mục Hộp CƠM GIỮ NHIỆT  -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Đồ vệ sinh - Làm sạch</span>
                        </h2>
                        <ul class="li-sub-category-list">
                            <li class="active"><a href="shop-left-sidebar.html">Prime Video</a></li>
                            <li><a href="shop-left-sidebar.html">Computers</a></li>
                            <li><a href="shop-left-sidebar.html">Electronics</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            <!--  -->
                            @foreach($product_cate_26 as $product)
                                <div class="col-lg-12">
                                    <!-- single-products-wrap start -->
                                    <div class="single-product-wrap">

                                        <div class="product-image">
                                            <a href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">
                                                <img class="product_image_206_206"
                                                     src="{{URL::to('public/uploads/products/'.$product->image)}}"
                                                     alt="Li's Product Image">
                                                {{--                                            {{('public/frontend/images/product/large-size/1.jpg')}}--}}
                                            </a>
                                            <!-- nếu giá khuyến mãi != 0
                                              tức là có giảm giá -->
                                            @if($product->new !=0)
                                                <span class="sticker">New</span>
                                                {{--                                            <span class="sticker"> -{{$product->promontion_price}}%</span>--}}
                                                {{--                                                <span class="discount-percentage">-7%</span>--}}
                                            @endif
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">sunhouse</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name"
                                                       href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">{{ $product->product_name }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    @if($product->promontion_price ==0)
                                                        <span class="new-price">{{ number_format($product->price) }} đ</span>
                                                    @else
                                                        <span class="new-price new-price-2">{{number_format(((float)$product->price*(100-$product->promontion_price))/100)}} đ</span>
                                                        <span
                                                            class="old-price">{{ number_format($product->price) }} đ</span>
                                                        {{--                                                    <span class="discount-percentage">-7%</span>--}}
                                                        <span style="color: red"  class="discount-percentage">  -{{$product->promontion_price}}%</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active">
                                                        <!-- trong thẻ a mình thêm một thuộc tính nữa là data-url= -->
                                                        <!--  thuộc tính nữa là data-url= tên route name ở bên web.php -->
                                                        <!--  và truyền vào cái key, value key là  id = value là = cái product chỏ đên id['id'=>$product->product_id]  -->
                                                        <a onclick="add({{$product->product_id}})" href="javascript:">
                                                            Mua sản phẩm</a>
                                                    </li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="" title="Xem nhanh" class="quick-view-btn xemnhanh"
                                                           data-toggle="modal" data-target="#xemnhanh" data-id_product="{{$product->product_id}}">
                                                            <i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-products-wrap end -->
                                </div>
                        @endforeach
                        <!--  -->
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>

    <!-- Begin Li's Hộp giữ nhiệt catgory   Product Area -->
    <!-- Li's Laptop Product Area End Here -->
    <!-- Begin Li's TV & Audio Product Area -->

    <section class="product-area li-laptop-product pt-60 pb-45">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <!-- Hiển thị sản phẩm theo danh mục Hộp CƠM GIỮ NHIỆT  -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Hộp CƠM GIỮ NHIỆT</span>
                        </h2>
                        <ul class="li-sub-category-list">
                            <li class="active"><a href="shop-left-sidebar.html">Prime Video</a></li>
                            <li><a href="shop-left-sidebar.html">Computers</a></li>
                            <li><a href="shop-left-sidebar.html">Electronics</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            <!--  -->
                            @foreach($product_cate as $product)
                                <div class="col-lg-12">
                                    <!-- single-products-wrap start -->
                                    <div class="single-product-wrap">

                                        <div class="product-image">
                                            <a href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">
                                                <img class="product_image_206_206"
                                                     src="{{URL::to('public/uploads/products/'.$product->image)}}"
                                                     alt="Li's Product Image">
                                                {{--                                            {{('public/frontend/images/product/large-size/1.jpg')}}--}}
                                            </a>
                                            <!-- nếu giá khuyến mãi != 0
                                              tức là có giảm giá -->
                                            @if($product->new !=0)
                                                <span class="sticker">New</span>
                                                {{--                                            <span class="sticker"> -{{$product->promontion_price}}%</span>--}}
                                                {{--                                                <span class="discount-percentage">-7%</span>--}}
                                            @endif
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">sunhouse</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name"
                                                       href="{{route('products-detail-view',['product_id'=>$product->product_id])}}">{{ $product->product_name }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    @if($product->promontion_price ==0)
                                                        <span class="new-price">{{ number_format($product->price) }} đ</span>
                                                    @else
                                                        <span class="new-price new-price-2">{{number_format(((float)$product->price*(100-$product->promontion_price))/100)}} đ</span>
                                                        <span
                                                            class="old-price">{{ number_format($product->price) }} đ</span>
                                                        {{--                                                    <span class="discount-percentage">-7%</span>--}}
                                                        <span style="color: red"  class="discount-percentage">  -{{$product->promontion_price}}%</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active">
                                                        <!-- trong thẻ a mình thêm một thuộc tính nữa là data-url= -->
                                                        <!--  thuộc tính nữa là data-url= tên route name ở bên web.php -->
                                                        <!--  và truyền vào cái key, value key là  id = value là = cái product chỏ đên id['id'=>$product->product_id]  -->
                                                        <a onclick="add({{$product->product_id}})" href="javascript:">
                                                            Mua sản phẩm</a>
                                                    </li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="" title="Xem nhanh" class="quick-view-btn xemnhanh"
                                                           data-toggle="modal" data-target="#xemnhanh" data-id_product="{{$product->product_id}}">
                                                            <i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-products-wrap end -->
                                </div>
                        @endforeach
                        <!--  -->
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>

    <!-- Li's TV & Audio Product Area End Here -->
{{--    <!-- Begin Li's Main Blog Page Area -->--}}
{{--    <div class="li-main-blog-page pt-60 pb-55">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <!-- Begin Li's Main Content Area -->--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="row li-main-content">--}}
{{--                        <div class="col-lg-4 col-md-6">--}}
{{--                            <div class="li-blog-single-item pb-25">--}}
{{--                                <div class="li-blog-banner">--}}
{{--                                    <a href="blog-details-left-sidebar.html"><img class="img-full" src="images/blog-banner/2.jpg" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <div class="li-blog-content">--}}
{{--                                    <div class="li-blog-details">--}}
{{--                                        <h3 class="li-blog-heading pt-25"><a href="blog-details-left-sidebar.html">blog image post</a></h3>--}}
{{--                                        <div class="li-blog-meta">--}}
{{--                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>--}}
{{--                                            <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>--}}
{{--                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>--}}
{{--                                        </div>--}}
{{--                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p>--}}
{{--                                        <a class="read-more" href="blog-details-left-sidebar.html">Read More...</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-6">--}}
{{--                            <div class="li-blog-single-item pb-25">--}}
{{--                                <div class="li-blog-gallery-slider slick-dot-style">--}}
{{--                                    <div class="li-blog-banner">--}}
{{--                                        <a href="blog-details-left-sidebar.html"><img class="img-full" src="images/blog-banner/1.jpg" alt=""></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="li-blog-banner">--}}
{{--                                        <a href="blog-details-left-sidebar.html"><img class="img-full" src="images/blog-banner/2.jpg" alt=""></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="li-blog-banner">--}}
{{--                                        <a href="blog-details-left-sidebar.html"><img class="img-full" src="images/blog-banner/3.jpg" alt=""></a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="li-blog-content">--}}
{{--                                    <div class="li-blog-details">--}}
{{--                                        <h3 class="li-blog-heading pt-25"><a href="blog-details-left-sidebar.html">blog gallery post</a></h3>--}}
{{--                                        <div class="li-blog-meta">--}}
{{--                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>--}}
{{--                                            <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>--}}
{{--                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>--}}
{{--                                        </div>--}}
{{--                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p>--}}
{{--                                        <a class="read-more" href="blog-details-left-sidebar.html">Read More...</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-6">--}}
{{--                            <div class="li-blog-single-item pb-25">--}}
{{--                                <div class="li-blog-banner embed-responsive embed-responsive-16by9">--}}
{{--                                    <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/300107209&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>--}}
{{--                                </div>--}}
{{--                                <div class="li-blog-content">--}}
{{--                                    <div class="li-blog-details">--}}
{{--                                        <h3 class="li-blog-heading pt-25"><a href="blog-details-left-sidebar.html">blog audio post</a></h3>--}}
{{--                                        <div class="li-blog-meta">--}}
{{--                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>--}}
{{--                                            <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>--}}
{{--                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>--}}
{{--                                        </div>--}}
{{--                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p>--}}
{{--                                        <a class="read-more" href="blog-details-left-sidebar.html">Read More...</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-6">--}}
{{--                            <div class="li-blog-single-item pb-25">--}}
{{--                                <div class="li-blog-banner embed-responsive embed-responsive-16by9">--}}
{{--                                    <iframe src="https://www.youtube.com/embed/DR2c266yWEA" allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
{{--                                </div>--}}
{{--                                <div class="li-blog-content">--}}
{{--                                    <div class="li-blog-details">--}}
{{--                                        <h3 class="li-blog-heading pt-25"><a href="blog-details-left-sidebar.html">blog video post</a></h3>--}}
{{--                                        <div class="li-blog-meta">--}}
{{--                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>--}}
{{--                                            <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>--}}
{{--                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>--}}
{{--                                        </div>--}}
{{--                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p>--}}
{{--                                        <a class="read-more" href="blog-details-left-sidebar.html">Read More...</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-6">--}}
{{--                            <div class="li-blog-single-item pb-25">--}}
{{--                                <div class="li-blog-banner">--}}
{{--                                    <a href="blog-details-left-sidebar.html"><img class="img-full" src="images/blog-banner/5.jpg" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <div class="li-blog-content">--}}
{{--                                    <div class="li-blog-details">--}}
{{--                                        <h3 class="li-blog-heading pt-25"><a href="blog-details-left-sidebar.html">blog fifth post</a></h3>--}}
{{--                                        <div class="li-blog-meta">--}}
{{--                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>--}}
{{--                                            <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>--}}
{{--                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>--}}
{{--                                        </div>--}}
{{--                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p>--}}
{{--                                        <a class="read-more" href="blog-details-left-sidebar.html">Read More...</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4 col-md-6">--}}
{{--                            <div class="li-blog-single-item pb-25">--}}
{{--                                <div class="li-blog-banner">--}}
{{--                                    <a href="blog-details-left-sidebar.html"><img class="img-full" src="images/blog-banner/6.jpg" alt=""></a>--}}
{{--                                </div>--}}
{{--                                <div class="li-blog-content">--}}
{{--                                    <div class="li-blog-details">--}}
{{--                                        <h3 class="li-blog-heading pt-25"><a href="blog-details-left-sidebar.html">blog second post</a></h3>--}}
{{--                                        <div class="li-blog-meta">--}}
{{--                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>--}}
{{--                                            <a class="comment" href="#"><i class="fa fa-comment-o"></i> 3 comment</a>--}}
{{--                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 25 nov 2018</a>--}}
{{--                                        </div>--}}
{{--                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Cras pretium arcu ex.</p>--}}
{{--                                        <a class="read-more" href="blog-details-left-sidebar.html">Read More...</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Begin Li's Pagination Area -->--}}
{{--                        <div class="col-lg-12">--}}
{{--                            <div class="li-paginatoin-area text-center pt-25">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-12">--}}
{{--                                        <ul class="li-pagination-box">--}}
{{--                                            <li><a class="Previous" href="#">Previous</a></li>--}}
{{--                                            <li class="active"><a href="#">1</a></li>--}}
{{--                                            <li><a href="#">2</a></li>--}}
{{--                                            <li><a href="#">3</a></li>--}}
{{--                                            <li><a class="Next" href="#">Next</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Li's Pagination End Here Area -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Li's Main Content Area End Here -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Li's Main Blog Page Area End Here -->--}}


@endsection
