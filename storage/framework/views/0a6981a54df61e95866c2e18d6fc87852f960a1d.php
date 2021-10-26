<form action="#" >
    <div class="table-content table-responsive">
        <table class="table">
            <thead>
            <tr>

                <th class="li-product-thumbnail">ảnh</th>
                <th class="cart-product-name">sản phẩm</th>
                <th class="li-product-price">Gía</th>
                <th class="li-product-quantity">Số lượng</th>
                <th class="li-product-subtotal">Tổng</th>
                <th class="li-product-remove">Lưu</th>
                <th class="li-product-remove">Xóa</th>

            </tr>
            </thead>
            <tbody>

            <?php if(Session::has('cart') != null ): ?>
                <?php $__currentLoopData = Session::get('cart')->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td class="li-product-thumbnail"><a href="#"><img class="product_image_105_100"
                                                                          src="<?php echo e(URL::to('public/uploads/products/'.$item['item']->image)); ?>"
                                                                          alt="cart products"></a></td>
                        <td class="li-product-name"><a href="#"><?php echo e($item['item']->product_name); ?></a></td>
                        <td class="li-product-price">
                            <?php if($item['item']->promontion_price ==0): ?>
                                <span><?php echo e(number_format($item['item']->price)); ?> vnđ </span>
                            <?php else: ?>
                                <span ><?php echo e(number_format(($item['item']->price*(100-$item['item']->promontion_price))/100)); ?> vnđ</span>

                            <?php endif; ?>

                        <td class="quantity">
                            <label>Quantity</label>
                            <div class="cart-plus-minus">
                                <input data-i="<?php echo e($item['item']->product_id); ?>"  id="quanty-item-<?php echo e($item['item']->product_id); ?>" class="cart-plus-minus-box" value="<?php echo e($item['quanty']); ?>" type="text">
                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                            </div>
                        </td>

                        <td class="product-subtotal">
                            <?php if($item['item']->promontion_price ==0): ?>
                                <span class="amount"><?php echo e(number_format(($item['item']->price)*($item['quanty']))); ?> vnđ </span>
                            <?php else: ?>
                                <span class="amount"><?php echo e(number_format((($item['item']->price*(100-$item['item']->promontion_price))/100)*$item['quanty'])); ?>vnđ</span>

                            <?php endif; ?>


                        </td>
                        <td class="li-product-save"><a href="#"><i class="fa fa-save" onclick="SaveListCart(<?php echo e($item['item']->product_id); ?>);"></i></a>
                        </td>
                        <td class="li-product-remove"><a href="#"><i class="fa fa-times" onclick="DeleteListIteamCart(<?php echo e($item['item']->product_id); ?>);"></i></a>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-12">















        </div>
    </div>
    <div class="row">
        <div class="col-md-5 ml-auto">
            <div class="cart-page-total">
                
                <?php if(Session::has('cart') != null ): ?>
                    <h2>Tổng số giỏ hàng</h2>
                    <ul>
                        <?php $total_price = $total_quantity = 0; ?>
                        <?php $__currentLoopData = Session::get('cart')->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $total_price += ($value['item']->price * $value['quanty']);
                                $total_quantity += $value['quanty'];
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li>Tổng số lượng: <span><?php echo e($total_quantity); ?></span></li>
                        <li>Tổng Tiền: <span><?php echo e(number_format($total_price)); ?> VNĐ</span></li>

                    </ul>
                    <?php
                    //Khi mà đăng ký mình sẽ có customer_id hoặc đăng nhập cũng có customer_id,
                    // mình đặt vào một cái session
                    $customer_id = Session::get('customer_id');
                    //nếu tồn $customer_id thì sẽ đến trang checkout ( nếu có đăng ký rồi thì sẽ là thanh toán luôn )
                    if($customer_id!=NULL){
                    ?>
                    <a href="<?php echo e(URL::to('/checkout')); ?>">
                        <span>Tiến hành kiểm tra</span>
                    </a>

                    <?php
                    }else{// ngược lại sẽ đănh nhập
                    ?>
                    <a href="<?php echo e(URL::to('/login-checkout')); ?>">
                        <span>Tiến hành kiểm tra</span>
                    </a>
                    <?php
                    }
                    ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</form>

<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/product/shopping_cart/list_cart.blade.php ENDPATH**/ ?>