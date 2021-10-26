
<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('fronted.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>

<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
<?php echo $__env->make('fronted.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style>
        .ellipsis {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
        .block-ellipsis {
            display: -webkit-box;
            max-width: 100%;
            height: 90px;
            margin: 0 auto;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
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

    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Main Blog Page Area -->
    <div class="li-main-blog-page pt-60 pb-55">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Main Content Area -->
                <div class="col-lg-12">
                    <div class="row li-main-content">
                        <?php $__currentLoopData = $post_cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="li-blog-single-item pb-25">
                                    <div class="li-blog-banner">
                                        <a href=""><img  style="width:80%;height: 200px"class="img-full" src="<?php echo e(asset('public/uploads/post/'.$p->post_image)); ?>" alt=""></a>
                                    </div>
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h3 class="li-blog-heading pt-25"><a href="<?php echo e(url('/bai-viet/'.$p->post_slug)); ?>" class="block-ellipsis"><?php echo e($p->post_title); ?></a></h3>
                                            <div class="li-blog-meta">

                                                <a class="post-time" href="#"><i class="fa fa-calendar"></i> <?php echo e($p->created_at); ?></a>
                                            </div>
                                            <p><?php echo $p->post_desc; ?></p>
                                            <a class="read-more" href="<?php echo e(url('/bai-viet/'.$p->post_slug)); ?>">Xem thêm...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Begin Li's Pagination Area -->
                        <div class="col-lg-12">
                            <div class="li-paginatoin-area text-center pt-25">
                                <div class="row">
                                    <div class="col-2 mx-auto">
                                        <?php echo $post_cate->links(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Li's Pagination End Here Area -->
                    </div>
                </div>
                <!-- Li's Main Content Area End Here -->
            </div>
        </div>
    </div>
    <!-- Li's Main Blog Page Area End Here -->
























































    <!-- Li's Main Content Area End Here -->
<?php echo $__env->make('fronted.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Footer Shipping Area End Here -->
</div>
<?php echo $__env->make('fronted.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>




<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/baiviet/danhmucbaiviet.blade.php ENDPATH**/ ?>