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
<!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
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
                                <span>Hiển thị <?php echo e(count($category_by_id)); ?>  Sản phẩm</span>
                            </div>
                        </div>
                        <!-- products-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Sắp xếp theo:</p>
                                <form>
                                    <?php echo csrf_field(); ?>

                                    <select name="sort" id="sort" class="form-control">
                                        <option value="<?php echo e(Request::url()); ?>?sort_by=none">--Lọc theo--</option>
                                        <option value="<?php echo e(Request::url()); ?>?sort_by=tang_dan">--Giá tăng dần--</option>
                                        <option value="<?php echo e(Request::url()); ?>?sort_by=giam_dan">--Giá giảm dần--</option>
                                        <option value="<?php echo e(Request::url()); ?>?sort_by=kytu_az">Lọc theo tên A đến Z</option>
                                        <option value="<?php echo e(Request::url()); ?>?sort_by=kytu_za">Lọc theo tên Z đến A</option>
                                    </select>

                                </form>

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                

                                

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
                                        <?php $__currentLoopData = $category_by_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                <!-- single-products-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="single-product.html">
                                                            
                                                            <img class="product_image_218_218"
                                                                 src="<?php echo e(URL::to('public/uploads/products/'.$product->image)); ?>"
                                                                 alt="Li's Product Image">
                                                        </a>

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
                                                                   href="single-product.html"><?php echo e($product->product_name); ?></a>
                                                            </h4>
                                                            <div class="price-box">
                                                                <span class="new-price"><?php echo e(number_format($product->price)); ?> VNĐ</span>
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
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="paginatoin-area">
                                
                                <?php echo e($category_by_id->links()); ?>

                                
                            </div>
                        </div>
                    </div>
                    <!-- shop-products-wrapper end -->
                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <!--sidebar-categores-box start  -->
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <!--sidebar-categores-box end  -->
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box">
                        <div class="sidebar-title">
                            <h2>Lọc Sản Phẩm</h2>
                        </div>
                        <!-- btn-clear-all start -->
                    
                    <!-- btn-clear-all end -->


























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
                                <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $da_brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" value="<?php echo e($da_brand->attribute_id); ?> "
                                                       name="product-categori"><a href=""><?php echo e($da_brand->value); ?></a></li>
                                        </ul>
                                    </form>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="filter-sub-area pt-sm-10 pt-xs-10">
                            <h5 class="filter-sub-titel">Dung tích</h5>
                            <div class="size-checkbox">
                                <?php $__currentLoopData = $capaci; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $da_size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" value="<?php echo e($da_size->attribute_id); ?>"
                                                       name="product-size"><a href="#"><?php echo e($da_size->value); ?></a></li>

                                        </ul>
                                    </form>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                    
                    
                    
                    
                    
                    
                    

                    
                    
                    
                    
                    
                    <!-- filter-sub-area end -->
                        <!-- filter-sub-area start -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!-- filter-sub-area end -->
                    </div>
                    <!--sidebar-categores-box end  -->
                    <!-- category-sub-menu start -->
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- Content Wraper Area End Here -->
<?php echo $__env->make('fronted.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Footer Shipping Area End Here -->
</div>
<?php echo $__env->make('fronted.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>




<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/product/category/list.blade.php ENDPATH**/ ?>