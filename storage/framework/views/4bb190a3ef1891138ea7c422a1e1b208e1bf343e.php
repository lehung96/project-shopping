<?php $__env->startSection('main_content'); ?>
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area" style="margin-top: 60px">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="<?php echo e(route('home')); ?>">Trang chủ</a></li>
                    <li class="active">Lịch sử mua hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-10 mx-auto">











































        <br>
        <div class=" table-agile-info offset-3">
            <div class="col-sm-6 offset-3">
                <h4 class="m-0 text-dark ">Thông tin gửi đơn hàng</h4>
            </div>

            

            <div class="content">
                <?php


                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Tên Khách Hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Ghi chú</th>
                                    <th>Hình thức thanh toán</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><?php echo e($shipping->shipping_name); ?></td>
                                    <td><?php echo e($shipping->shipping_address); ?></td>
                                    <td><?php echo e($shipping->shipping_phone); ?></td>
                                    <td><?php echo e($shipping->shipping_notes); ?></td>
                                    
                                    <td><?php if($shipping->shipping_method==0): ?> Chuyển khoản <?php else: ?> Tiền mặt <?php endif; ?></td>


                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <div class=" table-agile-info offset-3">
            <div class="col-sm-6 offset-3">
                <h4 class="m-0 text-dark ">Liệt kê chi tiết đơn hàng</h4>
            </div>


            

            <div class="content">
                <?php


                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Thứ tự</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng kho còn</th>
                                    <th>Số lượng sản phẩm đã được bán</th>
                                    <th>Giá bán</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                <?php
                                    $i = 0;
                                     $total = 0;
                                ?>
                                <?php $__currentLoopData = $order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $i++;
                                        $subtotal = $details->product_price*$details->product_sales_quantity;
                                        $total+=$subtotal;//hoặc  $total=$subtotal+ $subtotal;
                                    ?>
                                    
                                    
                                    <tr class="color_qty_<?php echo e($details->product_id); ?>">

                                        <th scope="row"><?php echo e($i); ?></th>
                                        
                                        <td><?php echo e($details->product_name); ?></td>
                                        <td><?php echo e($details->product->product_quantity); ?></td>
                                        <td><?php echo e($details->product->product_sold); ?></td>
                                        <?php if($details->promontion_price ==0): ?>
                                            <td><?php echo e(number_format($details->product_price,0,',','.')); ?> đ</td>
                                        <?php else: ?>
                                            <td><?php echo e(number_format(((float)$details->product_price*(100-$details->promontion_price))/100)); ?>

                                                đ
                                            </td>
                                            <td><?php echo e(number_format($details->product_price,0,',','.')); ?> đ</td>
                                        <?php endif; ?>
                                        <td>
                                            <input style="width: 50px" type="number" min="1" readonly
                                                   class="order_qty_<?php echo e($details->product_id); ?>"
                                                   value="<?php echo e($details->product_sales_quantity); ?>"
                                                   name="product_sales_quantity">


                                            
                                            <input type="hidden" name="order_product_id" class="order_product_id"
                                                   value="<?php echo e($details->product_id); ?>">

                                            
                                            <input type="hidden" name="order_qty_storage"
                                                   class="order_qty_storage_<?php echo e($details->product_id); ?>"
                                                   
                                                   value="<?php echo e($details->product->product_quantity); ?>">

                                            
                                            
                                            
                                            
                                            
                                            

                                        </td>
                                        <td><?php echo e(number_format($subtotal ,0,',','.')); ?>đ</td>
                                    </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td colspan="2">
                                        Thanh toán: <?php echo e(number_format($total,0,',','.')); ?>đ
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <a target="_blank" href="<?php echo e(url('/print-order/'.$details->order_code)); ?>">In đơn hàng</a>
                        </div>
                        <div class="col-md-12">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('fronted.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/history/view_history.blade.php ENDPATH**/ ?>