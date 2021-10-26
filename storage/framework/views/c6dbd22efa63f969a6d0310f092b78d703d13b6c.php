





























































    <!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('fronted.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
<?php echo $__env->make('fronted.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
                    <li class="active"><?php echo e($meta_title); ?> </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Blog Sidebar Area -->

    <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="row li-main-content">
                        <div class="col-lg-12">
                            <div class="li-blog-single-item pb-30">
                                <div class="li-blog-banner">
                                    <a href="blog-details.html"><img class="img-full"
                                                                     src="images/blog-banner/bg-banner.jpg" alt=""></a>
                                </div>
                                <div class="li-blog-content offset-3">
                                    <div class="li-blog-details">
                                        <h3 class="li-blog-heading pt-25"><a href="#"><?php echo e($meta_title); ?></a></h3>
                                        <div class="li-blog-meta">
                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>

                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 26/7 2021</a>
                                        </div>
                                        <?php $__currentLoopData = $post_by_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="single-products " style="margin:10px 0;padding: 2px">
                                                <?php echo $p->post_content; ?>


                                            </div>
                                            <div class="clearfix"></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div class="li-blog-sharing text-center pt-30">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <!-- Blog comment Box Area End Here -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-2 order-2">
                    <h4><u>
                            <center>Các tin tức khác:</center>
                        </u></h4>
                    <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post_relate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="margin-top: 20px"><a href="<?php echo e(url('/bai-viet/'.$post_relate->post_slug)); ?>">➤
                                <b><?php echo e($post_relate->post_title); ?></b></a></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Begin Li's Main Content Area -->

            </div>
        </div>
    </div>
                <!-- Li's Main Content Area End Here -->
            <?php echo $__env->make('fronted.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Footer Shipping Area End Here -->
            </div>
<?php echo $__env->make('fronted.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>





<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/baiviet/baiviet.blade.php ENDPATH**/ ?>