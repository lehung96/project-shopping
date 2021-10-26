<?php $__env->startSection('main_content'); ?>
    <div class=" table-agile-info offset-3">
        <div class="col-sm-6 offset-3">
            <h4 class="m-0 text-dark ">Thông Tin Đăng Nhập</h4>
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
                                
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Số điện thoại</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                
                                
                                <td><?php echo e($customer->customer_name); ?></td>
                                <td><?php echo e($customer->customer_phone); ?></td>
                                <td></td>
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
                                        <input style="width: 50px" type="text" class="order_qty_<?php echo e($details->product_id); ?>" value="<?php echo e($details->product_sales_quantity); ?>"
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
                            <tr>

                                <td colspan="2">   
                                    
                                    
                                <?php $__currentLoopData = $getorder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $or): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <?php if($or->order_status==1): ?>
                                    <form method="post">
                                        <?php echo csrf_field(); ?>
                                        
                                        
                                        
                                        <select class="form-control order_details">
                                            
                                            <option id="<?php echo e($or->order_id); ?>" selected value="1">Chưa xử lý</option>
                                            <option id="<?php echo e($or->order_id); ?>" value="2">Đã xử lý-Đã giao hàng</option>
                                        </select>
                                    </form>
                                        <?php else: ?>  

                                            <form  method="post">
                                                <?php echo csrf_field(); ?> 
                                                <select class="form-control order_details">

                                                    <option disabled id="<?php echo e($or->order_id); ?>" value="1">Chưa xử lý</option>
                                                    <option id="<?php echo e($or->order_id); ?>" selected value="2">Đã xử lý-Đã giao hàng
                                                    </option>

                                                </select>
                                            </form>


                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>




<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/manageorder/view_order.blade.php ENDPATH**/ ?>