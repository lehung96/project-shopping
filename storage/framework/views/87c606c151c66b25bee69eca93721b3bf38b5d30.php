<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark offset-3">Liệt Kê mã Đơn Hàng tìm kiếm</h3>
        </div>

        <div class="content">
            <a href="<?php echo e(route('orders.trash')); ?>"
               data-url=""
               class="btn btn-danger float-right m-2 ">Thùng rác</a>
            <?php


            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    
                    
                    
                    
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
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
                            
                            <?php $__currentLoopData = $order_code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
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
                                        
                                        
                                        <a href="<?php echo e(URL::to('/view-order/'.$order->order_code)); ?>"
                                           class="btn btn-default">Xem</a>
                                        <a href="<?php echo e(route('delete.order',$order->order_code)); ?>"
                                           
                                           class="btn btn-danger ">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/manageorder/searchcodeorder.blade.php ENDPATH**/ ?>