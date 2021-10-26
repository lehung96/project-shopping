<?php $__env->startSection('main_content'); ?>
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area"style="margin-top: 60px">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
                    <li class="active">Lịch sử mua hàng</li>
                </ul>
            </div>
        </div>
    </div>
    
    <h4>
        <center class="mt-20">LỊCH SỬ MUA HÀNG</center>
    </h4>
    <div class="col-sm-10 mx-auto">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Thứ tự</th>
                <th>Mã đơn hàng</th>
                <th>Ngày tháng đặt hàng</th>
                <th>Tình trạng đơn hàng</th>
                <th>Hoạt động</th>
            </tr>
            </thead>
            <tbody>
            
            <?php
                $i = 0;
            ?>
            
            <?php $__currentLoopData = $getorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                <?php
                    $i++;
                ?>
                <tr>
                    
                    <th scope="row"><?php echo e($i); ?></th>
                    <td><?php echo e($order->order_code); ?></td>
                    <td><?php echo e($order->created_at); ?></td>

                    
                    <td><?php if($order->order_status==1): ?>
                            Đơn hàng mới
                        <?php else: ?>
                            Đã xử lý - Đã giao hàng
                        <?php endif; ?>
                    </td>
                    <td>
                        
                        
                        <a href="<?php echo e(URL::to('/view-history/'.$order->order_code)); ?>"
                           class="btn btn-default">Xem</a>




                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-12">
        <?php echo e($getorder->links()); ?>

    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('fronted.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/history/index.blade.php ENDPATH**/ ?>