<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Xóa mềm ', 'key' => 'Danh Sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content">
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
                            
                            <?php $__currentLoopData = $orders_trash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <?php
                                    $i++;
                                ?>
                                <tr>
                                    
                                    <th scope="row"><?php echo e($i); ?></th>
                                    <td><?php echo e($orders_trash->order_code); ?></td>
                                    <td><?php echo e($orders_trash->created_at); ?></td>

                                    
                                    <td><?php if($orders_trash->order_status==1): ?>
                                            Đơn hàng mới
                                        <?php else: ?>
                                            Đã xử lý - Đã giao hàng
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        
                                        
                                        <a href="<?php echo e(URL::to('/view-order/'.$orders_trash->order_code)); ?>"
                                           class="btn btn-default">Xem</a>
                                        <a href="<?php echo e(route('delete.order',$orders_trash->order_code)); ?>"
                                           
                                           class="btn btn-danger ">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($orders_trash->links()); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/manageorder/trash.blade.php ENDPATH**/ ?>