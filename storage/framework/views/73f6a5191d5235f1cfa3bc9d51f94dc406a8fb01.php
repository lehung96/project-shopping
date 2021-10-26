
<?php if(Session::has('cart') != null ): ?>
    <ul class="minicart-product-list">
        
        <?php $__currentLoopData = Session::get('cart')->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


            <li>
                <a href="single-product.html" class="minicart-product-image">
                    <img class="product_image_105_105" src="<?php echo e(URL::to('public/uploads/products/'.$item['item']->image)); ?>" alt="cart products">
                </a>
                <div class="minicart-product-details">
                    <h6><a href="single-product.html"><?php echo e($item['item']->product_name); ?></a></h6>
                    <?php if($item['item']->promontion_price ==0): ?>
                        <span><?php echo e(number_format($item['item']->price)); ?> vnđ x <?php echo e($item['quanty']); ?></span>
                    <?php else: ?>
                        <span ><?php echo e(number_format(($item['item']->price*(100-$item['item']->promontion_price))/100)); ?>vnđ x <?php echo e($item['quanty']); ?></span>

                    <?php endif; ?>

                </div>
                

                
                <button class="close" title="Remove">
                    <i  class="fa fa-close" onclick="delete_cart(<?php echo e($item['item']->product_id); ?>)"></i>
                </button>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <p class="minicart-total">TỔNG Tiền :
    <?php $total_price = $total_quantity = 0; ?>
    <?php $__currentLoopData = Session::get('cart')->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $total_price += ($value['item']->price * $value['quanty']);
        $total_quantity += $value['quanty'];
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <span><?php echo e(number_format($total_price)); ?> VNĐ</span>


    
    
    <input hidden id="total-price-cart" type="number" value="<?php echo e(number_format(Session::get('cart')->totalPrice)); ?>" VNĐ>
    <input hidden id="total-quanty-cart" type="number" value="<?php echo e((Session::get('cart')->totalQuanty)); ?>">



<?php endif; ?>








<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/product/shopping_cart/cart.blade.php ENDPATH**/ ?>