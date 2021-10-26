<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('fronted.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
<?php echo $__env->make('fronted.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    <?php $__currentLoopData = $details_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="content-wraper">
        <div class="container">

                <div class="row single-product-area">
                    <div class="col-lg-5 col-md-6">
                        <!-- Product Details Left -->

                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="lg-image detail_image">
                                    <a class="popup-img venobox vbox-item" href="images/product/large-size/1.jpg"
                                       data-gall="myGallery">
                                        <img class="product_image_415_415"
                                             src="<?php echo e(asset('public/uploads/gallery/'.$gal->gallery_image)); ?>"
                                             alt="<?php echo e($gal->gallery_name); ?>">
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="product-details-thumbs slider-thumbs-1">
                                <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="sm-image"><img
                                        src="<?php echo e(asset('public/uploads/gallery/'.$gal->gallery_image)); ?>"
                                        alt="product image thumb"></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>

                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2><?php echo e($pro_details->product_name); ?></h2>
                                <p>Mã ID: <?php echo e($pro_details->product_id); ?></p>
                                
                                <div class="rating-box pt-5">
                                    <ul class="rating rating-with-review-item">
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                        
                                        
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <?php if($pro_details->promontion_price ==0): ?>
                                        <span class="new-price "><?php echo e(number_format($pro_details->price)); ?> đ</span>
                                    <?php else: ?>
                                        <span class="new-price new-price-2"><?php echo e(number_format(((float)$pro_details->price*(100-$pro_details->promontion_price))/100)); ?> đ</span>
                                        <span
                                            class="old-price decoration_price"><?php echo e(number_format($pro_details->price)); ?> đ</span>
                                        
                                        <span style="color: red"
                                              class="sticker"> -<?php echo e($pro_details->promontion_price); ?>%</span>
                                    <?php endif; ?>

                                </div>


                                
                                
                                
                                
                                
                                <p><b>Tình trạng:Còn hàng</b></p>
                                <p><b>Điều kiện:</b> Mới 100%</p>
                                <p><b>Số lượng kho còn:</b> <?php echo e($pro_details->product_quantity); ?></p>
                                <p><b>Danh mục:</b> <?php echo e($pro_details->name); ?></p>
                                <div class="product-desc">
                                    <p>
                                            <span>
                                            </span>
                                    </p>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                <div class="single-add-to-cart">
                                    
                                    <form class="cart-quantity" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e($pro_details->product_id); ?>" id="product_id">
                                        <input type="hidden" value="<?php echo e($pro_details->product_quantity); ?>" id="pro_quantity">
                                        <div class="quantity">
                                            <label>chọn số lượng</label>
                                            <div class="cart-plus-minus">

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
                        <span><?php echo $pro_details->desc; ?></span>
                    </div>
                </div>
                <div id="product-details" class="tab-pane" role="tabpanel">
                    <div class="product-details-manufacturer">
                     <span><?php echo $pro_details->content; ?> </span>

                    </div>
                </div>
                <div class="tab-pane fade active in" id="reviews" class="tab-pane" role="tabpanel">
                    <div class="product-reviews">
                        <div class="product-details-comment-block">

                            <div class="col-sm-12">
                                <ul>



                                </ul>
                                <style type="text/css">
                                    .style_comment {
                                        border: 1px solid #ddd;
                                        border-radius: 10px;
                                        background: #F0F0E9;
                                    }
                                </style>

                                <form>
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="comment_product_id" class="comment_product_id" value="<?php echo e($pro_details->product_id); ?>">
                                    <div id="comment_show"></div>

                                </form>

                                <p><b>Viết đánh giá của bạn</b></p>

                                <!------Rating here---------->
                                <ul class="list-inline rating"  title="Average Rating">
                                    <?php for($count=1; $count<=5; $count++): ?>
                                        <?php
                                            if($count<=$rating){
                                                $color = 'color:#ffcc00;';
                                            }
                                            else {
                                                $color = 'color:#ccc;';
                                            }

                                        ?>

                                        <li title="star_rating" id="<?php echo e($pro_details->product_id); ?>-<?php echo e($count); ?>" data-index="<?php echo e($count); ?>"  data-product_id="<?php echo e($pro_details->product_id); ?>" data-rating="<?php echo e($rating); ?>" class="rating" style="cursor:pointer; <?php echo e($color); ?> font-size:30px;">&#9733;</li>
                                    <?php endfor; ?>

                                </ul>
















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






































































































                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $related_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img class="product_image_206_206"
                                                     src="<?php echo e(URL::to('public/uploads/products/'.$related_pro->image)); ?>"
                                                     alt="Li's Product Image">
                                            </a>
                                            
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
                                                       href="single-product.html"><?php echo e($related_pro->product_name); ?></a>
                                                </h4>
                                                <div class="price-box">
                                                    <?php if($related_pro->promontion_price ==0): ?>
                                                        <span class="new-price"><?php echo e(number_format($related_pro->price)); ?> đ</span>
                                                    <?php else: ?>
                                                        <span class="new-price new-price-2"><?php echo e(number_format(((float)$related_pro->price*(100-$related_pro->promontion_price))/100)); ?> đ</span>
                                                        <span
                                                            class="old-price"><?php echo e(number_format($related_pro->price)); ?> đ</span>
                                                        <span style="color: red" class="discount-percentage"> -<?php echo e($related_pro->promontion_price); ?>%</span>
                                                    <?php endif; ?>

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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Laptop Product Area End Here -->
<?php echo $__env->make('fronted.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Footer Shipping Area End Here -->
</div>
<?php echo $__env->make('fronted.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>





<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/product/product_detail/viewListDetailProduct.blade.php ENDPATH**/ ?>