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

<!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Single Product</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- content-wraper start -->
    @foreach($details_product as $pro_details)
    <div class="content-wraper">
        <div class="container">

                <div class="row single-product-area">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->
{{--                        @foreach($gallery as $key => $gal)--}}
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                @foreach($gallery as $key => $gal)
                                <div class="lg-image detail_image">
                                    <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg"
                                       data-gall="myGallery">
                                        <img class="product_image_415_415"
                                             src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}"
                                             alt="{{$gal->gallery_name}}">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                @foreach($gallery as $key => $gal)
                                <div class="sm-image"><img
                                        src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}"
                                        alt="product image thumb"></div>
                                @endforeach
                            </div>

                        </div>

                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>{{$pro_details->product_name}}</h2>
                                <p>Mã ID: {{$pro_details->product_id}}</p>
                                {{--                                <span class="product-details-ref">Reference: demo_15</span>--}}
                                <div class="rating-box pt-5">
                                    <ul class="rating rating-with-review-item">
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        {{--                                        <li class="review-item"><a href="#">Read Review</a></li>--}}
                                        {{--                                        <li class="review-item"><a href="#">Write Review</a></li>--}}
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    @if($pro_details->promontion_price ==0)
                                        <span class="new-price ">{{ number_format($pro_details->price) }} đ</span>
                                    @else
                                        <span class="new-price new-price-2">{{number_format(((float)$pro_details->price*(100-$pro_details->promontion_price))/100)}} đ</span>
                                        <span
                                            class="old-price decoration_price">{{ number_format($pro_details->price) }} đ</span>
                                        {{--                                                    <span class="discount-percentage">-7%</span>--}}
                                        <span style="color: red"
                                              class="sticker"> -{{$pro_details->promontion_price}}%</span>
                                    @endif

                                </div>


                                {{--                                <div class="taxable">--}}
                                {{--                                    <span class="valibled">Tình trạng:</span>--}}
                                {{--                                    <span class=" availabel ">--}}
                                {{--			                          <span>Còn hàng</span></span>--}}
                                {{--                                </div>--}}
                                <p><b>Tình trạng:Còn hàng</b></p>
                                <p><b>Điều kiện:</b> Mới 100%</p>
                                <p><b>Số lượng kho còn:</b> {{$pro_details->product_quantity}}</p>
                                <p><b>Danh mục:</b> {{$pro_details->name}}</p>
                                <div class="product-desc">
                                    <p>
                                            <span>
                                            </span>
                                    </p>
                                </div>
                                {{--                                <div class="vender_">--}}
                                {{--                                    <ul>--}}
                                {{--                                        <li>--}}
                                {{--                                            <span class="brand">Thương hiệu:</span>--}}
                                {{--                                            <span class="bold">Magic Eco</span>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li>--}}
                                {{--                                            <span  class="brand">Dòng sản phẩm:</span>--}}
                                {{--                                            <span class="bold">Nồi chiên nướng không dầu</span>--}}
                                {{--                                        </li>--}}
                                {{--                                        <li><span  class="brand">Mua hàng: 1800 6977 / 0901 410 898 </span></li>--}}
                                {{--                                        <li><span>Bảo hành: 028 5431 8607</span></li>--}}
                                {{--                                    </ul>--}}
                                {{--                                </div>--}}

                                <div class="single-add-to-cart">
                                    {{--{{URL::to('/add-cart-details/'.$pro_details->product_id)}}--}}
                                    <form class="cart-quantity" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$pro_details->product_id}}" id="product_id">
                                        <input type="hidden" value="{{$pro_details->product_quantity}}" id="pro_quantity">
                                        <div class="quantity">
                                            <label>chọn số lượng</label>
                                            <div class="cart-plus-minus">
{{--                                                <input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />--}}
                                                <input class="cart-plus-minus-box" value="1" type="number" min="1"
                                                       id="quantity">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </div>

                                        <button class="add-to-cart" id="btn-add-cart" type="button">
                                            CHO VÀO GIỎ HÀNG
                                        </button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                    <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to
                                        wishlist</a>
                                    <div class="product-social-sharing pt-25">
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                            </li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a>
                                            </li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google
                                                    +</a></li>
                                            <li class="instagram"><a href="#"><i
                                                        class="fa fa-instagram"></i>Instagram</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="block-reassurance">
                                    <ul>
                                        <li>
                                            <div class="reassurance-item">
                                                <div class="reassurance-icon">
                                                    <i class="fa fa-check-square-o"></i>
                                                </div>
                                                <p>Security policy (edit with Customer reassurance module)</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="reassurance-item">
                                                <div class="reassurance-icon">
                                                    <i class="fa fa-truck"></i>
                                                </div>
                                                <p>Delivery policy (edit with Customer reassurance module)</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="reassurance-item">
                                                <div class="reassurance-icon">
                                                    <i class="fa fa-exchange"></i>
                                                </div>
                                                <p> Return policy (edit with Customer reassurance module)</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
    <!-- content-wraper end -->
    <!-- Begin Product Area -->
    <div class="product-area pt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a  data-toggle="tab" href="#description"><span>Mô Tả</span></a>
                            </li>
                            <li><a data-toggle="tab" href="#product-details"><span>Chi Tiết Sản Phẩm</span></a></li>
                            <li><a class="active" data-toggle="tab" href="#reviews"><span>Đanh giá</span></a></li>
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="description" class="tab-pane " role="tabpanel">
                    <div class="product-description">
                        <span>{!!$pro_details->desc!!}</span>
                    </div>
                </div>
                <div id="product-details" class="tab-pane" role="tabpanel">
                    <div class="product-details-manufacturer">
                     <span>{!!$pro_details->content!!} </span>

                    </div>
                </div>
                <div class="tab-pane fade active in" id="reviews" class="tab-pane" role="tabpanel">
                    <div class="product-reviews">
                        <div class="product-details-comment-block">

                            <div class="col-sm-12">
                                <ul>
{{--                                    <li><a href=""><i class="fa fa-user"></i>Admin</a></li>--}}
{{--                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>--}}
{{--                                    <li><a href=""><i class="fa fa-calendar-o"></i>16.09.2020</a></li>--}}
                                </ul>
                                <style type="text/css">
                                    .style_comment {
                                        border: 1px solid #ddd;
                                        border-radius: 10px;
                                        background: #F0F0E9;
                                    }
                                </style>

                                <form>
                                    @csrf
                                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$pro_details->product_id}}">
                                    <div id="comment_show"></div>

                                </form>

                                <p><b>Viết đánh giá của bạn</b></p>

                                <!------Rating here---------->
                                <ul class="list-inline rating"  title="Average Rating">
                                    @for($count=1; $count<=5; $count++)
                                        @php
                                            if($count<=$rating){
                                                $color = 'color:#ffcc00;';
                                            }
                                            else {
                                                $color = 'color:#ccc;';
                                            }

                                        @endphp

                                        <li title="star_rating" id="{{$pro_details->product_id}}-{{$count}}" data-index="{{$count}}"  data-product_id="{{$pro_details->product_id}}" data-rating="{{$rating}}" class="rating" style="cursor:pointer; {{$color}} font-size:30px;">&#9733;</li>
                                    @endfor

                                </ul>
{{--                                --}}{{-- <ul class="list-inline"  title="Average Rating">--}}
{{--                                    @for($count=1; $count<=5; $count++)--}}
{{--                                        @php--}}
{{--                                            if($count<=$rating){--}}
{{--                                                $color = 'color:#ffcc00;';--}}
{{--                                            }--}}
{{--                                            else {--}}
{{--                                                $color = 'color:#ccc;';--}}
{{--                                            }--}}

{{--                                        @endphp--}}
{{--                                      <li title="đánh giá sao"--}}
{{--                                      id="{{$value->product_id}}-{{$count}}"--}}
{{--                                      data-index="{{$count}}"--}}
{{--                                      data-product_id="{{$value->product_id}}"--}}
{{--                                      data-rating="{{$rating}}"--}}
{{--                                      class="rating"--}}
{{--                                      style="cursor:pointer; {{$color}} font-size:30px;">--}}
{{--                                      &#9733;--}}
{{--                                    </li>--}}
{{--                                    @endfor--}}
{{--                                </ul> --}}


                                <form action="#">
                                    <div class="comment-review" style=" padding-bottom: 10px">
										<span>
											<input style="width:100%;margin-left: 0;" type="text" class="comment_name" placeholder="Tên bình luận"/>

										</span>
                                    </div>
                                    <textarea name="comment" class="comment_content" placeholder="Nội dung bình luận"></textarea>
                                    <div id="notify_comment"></div>

                                    <button type="button" class="btn btn-default pull-right send-comment">
                                        Gửi bình luận
                                    </button>

                                </form>
                            </div>
{{--                            <div class="comment-review">--}}
{{--                                <span>Grade</span>--}}
{{--                                <ul class="rating">--}}
{{--                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                    <li><i class="fa fa-star-o"></i></li>--}}
{{--                                    <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                    <li class="no-star"><i class="fa fa-star-o"></i></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <div class="comment-author-infos pt-25">--}}
{{--                                <span>HTML 5</span>--}}
{{--                                <em>01-12-18</em>--}}
{{--                            </div>--}}
{{--                            <div class="comment-details">--}}
{{--                                <h4 class="title-block">Demo</h4>--}}
{{--                                <p>Plaza</p>--}}
{{--                            </div>--}}
{{--                            <div class="review-btn">--}}
{{--                                <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your--}}
{{--                                    Review!</a>--}}
{{--                            </div>--}}
{{--                            <!-- Begin Quick View | Modal Area -->--}}
{{--                            <div class="modal fade modal-wrapper" id="mymodal">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <h3 class="review-page-title">Write Your Review</h3>--}}
{{--                                            <div class="modal-inner-area row">--}}
{{--                                                <div class="col-lg-6">--}}
{{--                                                    <div class="li-review-product">--}}
{{--                                                        <img src="images/product/large-size/3.jpg" alt="Li's Product">--}}
{{--                                                        <div class="li-review-product-desc">--}}
{{--                                                            <p class="li-product-name">Today is a good day Framed--}}
{{--                                                                poster</p>--}}
{{--                                                            <p>--}}
{{--                                                                <span>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Design </span>--}}
{{--                                                            </p>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="col-lg-6">--}}
{{--                                                    <div class="li-review-content">--}}
{{--                                                        <!-- Begin Feedback Area -->--}}
{{--                                                        <div class="feedback-area">--}}
{{--                                                            <div class="feedback">--}}
{{--                                                                <h3 class="feedback-title">Our Feedback</h3>--}}
{{--                                                                <form action="#">--}}
{{--                                                                    <p class="your-opinion">--}}
{{--                                                                        <label>Your Rating</label>--}}
{{--                                                                        <span>--}}
{{--                                                                                    <select class="star-rating">--}}
{{--                                                                                      <option value="1">1</option>--}}
{{--                                                                                      <option value="2">2</option>--}}
{{--                                                                                      <option value="3">3</option>--}}
{{--                                                                                      <option value="4">4</option>--}}
{{--                                                                                      <option value="5">5</option>--}}
{{--                                                                                    </select>--}}
{{--                                                                                </span>--}}
{{--                                                                    </p>--}}
{{--                                                                    <p class="feedback-form">--}}
{{--                                                                        <label for="feedback">Your Review</label>--}}
{{--                                                                        <textarea id="feedback" name="comment" cols="45"--}}
{{--                                                                                  rows="8"--}}
{{--                                                                                  aria-required="true"></textarea>--}}
{{--                                                                    </p>--}}
{{--                                                                    <div class="feedback-input">--}}
{{--                                                                        <p class="feedback-form-author">--}}
{{--                                                                            <label for="author">Name<span--}}
{{--                                                                                    class="required">*</span>--}}
{{--                                                                            </label>--}}
{{--                                                                            <input id="author" name="author" value=""--}}
{{--                                                                                   size="30" aria-required="true"--}}
{{--                                                                                   type="text">--}}
{{--                                                                        </p>--}}
{{--                                                                        <p class="feedback-form-author feedback-form-email">--}}
{{--                                                                            <label for="email">Email<span--}}
{{--                                                                                    class="required">*</span>--}}
{{--                                                                            </label>--}}
{{--                                                                            <input id="email" name="email" value=""--}}
{{--                                                                                   size="30" aria-required="true"--}}
{{--                                                                                   type="text">--}}
{{--                                                                            <span class="required"><sub>*</sub> Required fields</span>--}}
{{--                                                                        </p>--}}
{{--                                                                        <div class="feedback-btn pb-15">--}}
{{--                                                                            <a href="#" class="close"--}}
{{--                                                                               data-dismiss="modal" aria-label="Close">Close</a>--}}
{{--                                                                            <a href="#">Submit</a>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </form>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- Feedback Area End Here -->--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- Quick View | Modal Area End Here -->--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach
    <!-- Product Area End Here -->
    <!-- Begin Li's Laptop Product Area -->
    <section class="product-area li-laptop-product pt-30 pb-50">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>SẢN PHẨM LIÊN QUAN</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach($related_product as $related_pro)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img class="product_image_206_206"
                                                     src="{{URL::to('public/uploads/products/'.$related_pro->image)}}"
                                                     alt="Li's Product Image">
                                            </a>
                                            {{--                                        <span class="sticker">New</span>--}}
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="product-details.html">Graphic Corner</a>
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
                                                       href="single-product.html">{{$related_pro->product_name}}</a>
                                                </h4>
                                                <div class="price-box">
                                                    @if($related_pro->promontion_price ==0)
                                                        <span class="new-price">{{ number_format($related_pro->price) }} đ</span>
                                                    @else
                                                        <span class="new-price new-price-2">{{number_format(((float)$related_pro->price*(100-$related_pro->promontion_price))/100)}} đ</span>
                                                        <span
                                                            class="old-price">{{ number_format($related_pro->price) }} đ</span>
                                                        <span style="color: red" class="discount-percentage"> -{{$related_pro->promontion_price}}%</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                           data-toggle="modal" data-target="#exampleModalCenter"><i
                                                                class="fa fa-eye"></i></a></li>
                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Laptop Product Area End Here -->
@include('fronted.footer')
<!-- Footer Shipping Area End Here -->
</div>
@include('fronted.script')
</body>

</html>





