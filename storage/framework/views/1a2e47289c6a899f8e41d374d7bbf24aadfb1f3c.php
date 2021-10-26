<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('fronted.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<!--in ra customer_id và shipping_id -->





    <!--[if lt IE 8]-->


      <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
            <?php echo $__env->make('fronted.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Header Area End Here -->
        <!-- Begin Slider With Category Menu Area -->

        <div class="slider-with-banner">
            <div class="container">
                <div class="row">
                    <!-- Begin Category Menu Area -->
                    <div class="col-lg-3">
                        <!--Category Menu Start-->
                        <?php echo $__env->make('fronted.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!--Category Menu End-->
                    </div>
                    <!-- Category Menu Area End Here -->
                    <!-- Begin Slider Area -->
                    <div class="col-lg-6 col-md-8">
                        <?php echo $__env->make('fronted.slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <!-- Slider Area End Here -->
                    <!-- Begin Li Banner Area -->
                    <div class="col-lg-3 col-md-4 text-center pt-sm-30">
                        <div class="li-banner">
                            <a href="#">
                                <img style="height: 220px" src="<?php echo e(asset('public/frontend/images/banner/banner_slide_img_1.jpg')); ?>" alt="">
                            </a>
                        </div>
                        <div class="li-banner mt-15 mt-sm-30 mt-xs-25 mb-xs-5">
                            <a href="#">
                                <img style="height: 220px" src="<?php echo e(asset('public/frontend/images/banner/banner_slide_img_2.jpg')); ?>" alt="">
                            </a>
                        </div>
                    </div>
                    <!-- Slider Area End Here -->
                </div>
            </div>
        </div>
        <!-- Begin Li's Static content Area -->
             <?php echo $__env->yieldContent("main_content"); ?>
       <!-- content Shipping Area End Here -->
        <!-- Begin Footer Area -->
             <?php echo $__env->make('fronted.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Footer Shipping Area End Here -->
   </div>
             <?php echo $__env->make('fronted.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>




<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/fronted/layout.blade.php ENDPATH**/ ?>