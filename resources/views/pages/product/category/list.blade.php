<!DOCTYPE html>
<html lang="en">

@include('fronted.head')
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
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
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="active">Danh Mục sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60 pt-sm-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <!-- Begin Li's Banner Area -->
                {{--                    <div class="single-banner shop-page-banner">--}}
                {{--                        <a href="#">--}}
                {{--                            <img src="images/bg-banner/2.jpg" alt="Li's Static Banner">--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
                <!-- Li's Banner Area End Here -->
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-30">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active" role="presentation"><a aria-selected="true" class="active show"
                                                                              data-toggle="tab" role="tab"
                                                                              aria-controls="grid-view"
                                                                              href="#grid-view"><i class="fa fa-th"></i></a>
                                    </li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span>Hiển thị {{count($category_by_id)}}  Sản phẩm</span>
                            </div>
                        </div>
                        <!-- products-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Sắp xếp theo:</p>
                                <form>
                                    @csrf

                                    <select name="sort" id="sort" class="form-control">
                                        <option value="{{Request::url()}}?sort_by=none">--Lọc theo--</option>
                                        <option value="{{Request::url()}}?sort_by=tang_dan">--Giá tăng dần--</option>
                                        <option value="{{Request::url()}}?sort_by=giam_dan">--Giá giảm dần--</option>
                                        <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo tên A đến Z</option>
                                        <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo tên Z đến A</option>
                                    </select>

                                </form>

                                {{--                                <form>--}}
                                {{--                                    @csrf--}}
                                {{--                                    <!-- tạo id="sort" để bên script ajax bắt sự #sort  -->--}}
                                {{--                                <select name="sort" id="sort" class="nice-select ">--}}
                                {{--                                    <!--Request sort_by(sắp xếp theo yêu cầu ) =none nghĩa là Lọc theo  -->--}}
                                {{--                     <!-- Request::url() là đường dẫn hiện tại và nối(?) nối thêm một yêu cầu nữa đó là ?sort_by=tang_dan là sắp xếp theo giá tăng dần   -->--}}
                                {{--                                    <option value="{{Request::url()}}?sort_by=none">--Lọc theo--</option>--}}
                                {{--                                    <!-- Request sort_by(sắp xếp theo yêu cầu =tang_dan nghĩa là theo tăng dần  ) -->--}}
                                {{--                                    <option value="{{Request::url()}}?sort_by=tang_dan">--Giá tăng dần--</option>--}}
                                {{--                                    <!-- products-select-box start -->--}}
                                {{--                                    <option value="{{Request::url()}}?sort_by=giam_dan">--Giá giảm dần--</option>--}}
                                {{--                                    <!-- products-select-box start -->--}}
                                {{--                                    <option value="{{Request::url()}}?sort_by=kytu_az">Lọc theo tên A đến Z</option>--}}
                                {{--                                    <!-- products-select-box start -->--}}
                                {{--                                    <option value="{{Request::url()}}?sort_by=kytu_za">Lọc theo tên Z đến A</option>--}}
                                {{--                                </select>--}}

                                {{--                                </form>--}}

                            </div>
                        </div>
                        <!-- products-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->
                    <!-- shop-products-wrapper start -->
                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="product-area shop-product-area">
                                    <div class="row">
                                        @foreach($category_by_id as $product)
                                            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                <!-- single-products-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="single-product.html">
                                                            {{--                                                        <img class="product_image_206_206"  src="{{URL::to('public/uploads/products/'.$product->image)}}" alt="Li's Product Image">--}}
                                                            <img class="product_image_218_218"
                                                                 src="{{URL::to('public/uploads/products/'.$product->image)}}"
                                                                 alt="Li's Product Image">
                                                        </a>
{{--                                                        <span class="sticker">New</span>--}}
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <a href="product-details.html">Magic</a>
                                                                </h5>
                                                                <div class="rating-box">
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star-o"></i>
                                                                        </li>
                                                                        <li class="no-star"><i class="fa fa-star-o"></i>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name"
                                                                   href="single-product.html">{{ $product->product_name}}</a>
                                                            </h4>
                                                            <div class="price-box">
                                                                <span class="new-price">{{ number_format($product->price) }} VNĐ</span>
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                                <li class="add-cart active"><a href="#"
                                                                                               class="add_to_cart">Mua
                                                                        Sản Phẩm</a></li>
                                                                <li><a href="#" title="quick view"
                                                                       class="quick-view-btn" data-toggle="modal"
                                                                       data-target="#exampleModalCenter"><i
                                                                            class="fa fa-eye"></i></a></li>
                                                                <li><a class="links-details" href="wishlist.html"><i
                                                                            class="fa fa-heart-o"></i></a></li>
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

                            <div class="paginatoin-area">
                                {{--                                <div class="row">--}}
                                {{ $category_by_id->links() }}
                                {{--                                </div>--}}
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--sidebar-categores-box start  -->
                {{--                    <div class="sidebar-categores-box mt-sm-30 mt-xs-30">--}}
                {{--                        <div class="sidebar-title">--}}
                {{--                            <h2>Laptop</h2>--}}
                {{--                        </div>--}}
                {{--                        <!-- category-sub-menu start -->--}}
                {{--                        <div class="category-sub-menu">--}}
                {{--                            <ul>--}}
                {{--                                <li class="has-sub"><a href="# ">Prime Video</a>--}}
                {{--                                    <ul>--}}
                {{--                                        <li><a href="#">All Videos</a></li>--}}
                {{--                                        <li><a href="#">Blouses</a></li>--}}
                {{--                                        <li><a href="#">Evening Dresses</a></li>--}}
                {{--                                        <li><a href="#">Summer Dresses</a></li>--}}
                {{--                                        <li><a href="#">T-Rent or Buy</a></li>--}}
                {{--                                        <li><a href="#">Your Watchlist</a></li>--}}
                {{--                                        <li><a href="#">Watch Anywhere</a></li>--}}
                {{--                                        <li><a href="#">Getting Started</a></li>--}}
                {{--                                    </ul>--}}
                {{--                                </li>--}}
                {{--                                <li class="has-sub"><a href="#">Computer</a>--}}
                {{--                                    <ul>--}}
                {{--                                        <li><a href="#">TV & Video</a></li>--}}
                {{--                                        <li><a href="#">Audio & Theater</a></li>--}}
                {{--                                        <li><a href="#">Camera, Photo</a></li>--}}
                {{--                                        <li><a href="#">Cell Phones</a></li>--}}
                {{--                                        <li><a href="#">Headphones</a></li>--}}
                {{--                                        <li><a href="#">Video Games</a></li>--}}
                {{--                                        <li><a href="#">Wireless Speakers</a></li>--}}
                {{--                                    </ul>--}}
                {{--                                </li>--}}
                {{--                                <li class="has-sub"><a href="#">Electronics</a>--}}
                {{--                                    <ul>--}}
                {{--                                        <li><a href="#">Amazon Home</a></li>--}}
                {{--                                        <li><a href="#">Kitchen & Dining</a></li>--}}
                {{--                                        <li><a href="#">Bed & Bath</a></li>--}}
                {{--                                        <li><a href="#">Appliances</a></li>--}}
                {{--                                    </ul>--}}
                {{--                                </li>--}}
                {{--                            </ul>--}}
                {{--                        </div>--}}
                {{--                        <!-- category-sub-menu end -->--}}
                {{--                    </div>--}}
                <!--sidebar-categores-box end  -->
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>Lọc Sản Phẩm</h2>
                        </div>
                        <!-- btn-clear-all start -->
                    {{--                        <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>--}}
                    <!-- btn-clear-all end -->

{{--                        <div class="filter-sub-area">--}}
{{--                            <label for="amount">Lọc giá theo</label>--}}

{{--                            <form>--}}
{{--                                <div id="slider-range"></div>--}}
{{--                                <style type="text/css">--}}
{{--                                    .style-range p {--}}
{{--                                        float: left;--}}
{{--                                        width: 25%;--}}
{{--                                    }--}}
{{--                                </style>--}}
{{--                                <div class="style-range">--}}
{{--                                    <p><input type="text" id="amount_start" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>--}}
{{--                                    <p><input type="text" id="amount_end" readonly style="border:0; color:#f6931f; font-weight:bold;"></p>--}}
{{--                                </div>--}}
{{--                                <input type="hidden" name="start_price" id="start_price">--}}
{{--                                <input type="hidden" name="end_price" id="end_price">--}}

{{--                                <br>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                                <input type="submit" name="filter_price" value="Lọc giá" class="btn btn-sm btn-default">--}}
{{--                            </form>--}}

{{--                        </div>--}}

                        <!-- filter-sub-area start -->
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Khoảng giá</h5>
                            <div style="padding-left: 5%">
                                <ul class="sort_product" style="padding: 6px;font-size: 15px">
                                    <li><a href="?price=1"> 200k - 500k</a></li>
                                    <li><a href="?price=2"> 500k - 1 triệu </a></li>
                                    <li><a href="?price=3"> 1,5 triệu - 2 triệu </a></li>
                                    <li><a href="?price=4"> 2 triệu - 3 triệu </a></li>
                                    <li><a href="?price=5"> 3 triệu - 5 triệu </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Nhà Sản xuất</h5>
                            <div class="categori-checkbox">
                                @foreach($brand as $da_brand )
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" value="{{$da_brand->attribute_id}} "
                                                       name="product-categori"><a href="">{{$da_brand->value}}</a></li>
                                        </ul>
                                    </form>
                                @endforeach
                            </div>
                        </div>

                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Dung tích</h5>
                            <div class="size-checkbox">
                                @foreach($capaci as $da_size )
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" value="{{$da_size->attribute_id}}"
                                                       name="product-size"><a href="#">{{$da_size->value}}</a></li>

                                        </ul>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                    {{--                        <div class="filter-sub-area pt-sm-10 pt-xs-10">--}}
                    {{--                            <h5 class="filter-sub-titel">Màu sắc</h5>--}}
                    {{--                            <div class="color-categoriy">--}}
                    {{--                                @foreach($color as $da_color )--}}
                    {{--                                <form action="#">--}}
                    {{--                                    <ul>--}}
                    {{--                                        <li><span class="white"></span><a href="#">  <i class="nav-icon fas fa-square" style="color:{{$da_color->value}}"></i></a></li>--}}

                    {{--                                    </ul>--}}
                    {{--                                </form>--}}
                    {{--                                @endforeach--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                    {{--                        <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">--}}
                    {{--                            <h5 class="filter-sub-titel">Dimension</h5>--}}
                    {{--                            <div class="categori-checkbox">--}}
                    {{--                                <form action="#">--}}
                    {{--                                    <ul>--}}
                    {{--                                        <li><input type="checkbox" name="product-categori"><a href="#">40x60cm </a></li>--}}
                    {{--                                        <li><input type="checkbox" name="product-categori"><a href="#">60x90cm </a></li>--}}
                    {{--                                        <li><input type="checkbox" name="product-categori"><a href="#">80x120cm </a></li>--}}
                    {{--                                    </ul>--}}
                    {{--                                </form>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    <!-- filter-sub-area end -->
                    </div>
                    <!--sidebar-categores-box end  -->
                    <!-- category-sub-menu start -->
                    {{--                    <div class="sidebar-categores-box mb-sm-0 mb-xs-0">--}}
                    {{--                        <div class="sidebar-title">--}}
                    {{--                            <h2>Laptop</h2>--}}
                    {{--                        </div>--}}
                    {{--                        <div class="category-tags">--}}
                    {{--                            <ul>--}}
                    {{--                                <li><a href="# ">Devita</a></li>--}}
                    {{--                                <li><a href="# ">Cameras</a></li>--}}
                    {{--                                <li><a href="# ">Sony</a></li>--}}
                    {{--                                <li><a href="# ">Computer</a></li>--}}
                    {{--                                <li><a href="# ">Big Sale</a></li>--}}
                    {{--                                <li><a href="# ">Accessories</a></li>--}}
                    {{--                            </ul>--}}
                    {{--                        </div>--}}
                    {{--                        <!-- category-sub-menu end -->--}}
                    {{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wraper Area End Here -->
@include('fronted.footer')
<!-- Footer Shipping Area End Here -->
</div>
@include('fronted.script')
</body>

</html>




