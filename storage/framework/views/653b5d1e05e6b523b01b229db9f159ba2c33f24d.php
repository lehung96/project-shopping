<div class="slider-area slider-area-3 pt-sm-30 pt-xs-30 pb-xs-30">
    <div class="slider-active owl-carousel">
        <!-- Begin Single Slide Area -->
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="single-slide align-center-left animation-style-01" style="
                background-image:  url(<?php echo e(asset('public/uploads/slider/'. $slide->image_name)); ?>);
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
                min-height: 452px;
                width: 100%;">
                <div class="slider-progress"></div>
                <div class="slider-content">
                    <h5><?php echo e($slide->description); ?> <span><?php echo e($slide->discount); ?> VNĐ</span> <?php echo e($slide->content_time); ?></h5>
                    <h2><?php echo e($slide->name); ?></h2>
                    <h3>Tổng quà đến  <span><?php echo e(number_format((float)$slide->price)); ?> triệu</span></h3>
                    <div class="default-btn slide-btn">
                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/fronted/slide.blade.php ENDPATH**/ ?>