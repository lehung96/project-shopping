<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('fronted.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
<?php echo $__env->make('fronted.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Thanh Toán giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <div class="row">
                <div class="col-lg-6 col-12">
                    
                    <form method="POST" action="<?php echo e(URL::to('/order-place')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="checkbox-form">
                            <h4><i style="color: #479bf3" class="fa fa-credit-card"></i> Chọn hình thức thanh toán</h4>
                            <div class="row payment-options">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list " id="paypal-button">

                                        <label><input name="payment_option" value="1" type="checkbox">Thanh toán online bằng Ví điện tử  <span class="required"><h4><i style="color: #479bf3" class="fa fa-cc-paypal"></i></h4></span> </label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label><input name="payment_option" value="2" type="checkbox">Giao hàng và thu tiền tại nhà </label>
                                    </div>
                                </div>
                                <div class="col-md-12">




                                </div>

                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div class="col-md-12 order-notes">




                                </div>
                                <div  class="col-md-6 order-button-payment">
                                    <input style="margin-left: 120px; margin-bottom: 5px; margin-top: 3px"  value="Đặt hàng" type="submit" name="send_order_place">
                                </div>
                                <div class="col-md-12">

                                </div>
                            </div>
                            <div class="different-address">
                                <div class="ship-different-title">
                                    <h5>
                                        <label>Quý khách có thể chọn hình thức thanh toán, hóa đơn VAT sau khi Gửi đơn hàng</label>

                                    </h5>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h4><i style="color: #479bf3" class="fa fa-shopping-cart"></i> Đơn Hàng </h4>
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
                                                <td class="li-product-price"><span
                                                        class="amount"><?php echo e(number_format($item['item']->price)); ?> VNĐ </span></td>
                                                <td class="quantity">
                                                    <label>Quantity</label>
                                                    <div class="cart-plus-minus">
                                                        <input data-i="<?php echo e($item['item']->product_id); ?>"  id="quanty-item-<?php echo e($item['item']->product_id); ?>" class="cart-plus-minus-box" value="<?php echo e($item['quanty']); ?>" type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount"><?php echo e(number_format($item['price'])); ?> VNĐ </span>
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
                                    <div class="coupon-all">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        
                                        <?php if(Session::has('cart') != null ): ?>
                                            <h5>Tổng số giỏ hàng:</h5>
                                            <ul>
                                                <li style="padding-left: 2px " >Tổng số lượng:<span><?php echo e(Session::get('cart')->totalQuanty); ?></span></li>
                                                <li style="padding-left: 2px ">Tổng Tiền: <span><?php echo e(number_format(Session::get('cart')->totalPrice)); ?> VNĐ</span></li>
                                                 
                                                  <?php
                                                      $vnd_to_usd= (Session::get('cart')->totalPrice)/23083;
                                                ?>
                                                <input type="hidden" id="vnd_to_usd" value="<?php echo e(round($vnd_to_usd,2)); ?>">
                                            </ul>
                                            
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </form>



















































                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Checkout Area End-->
<?php echo $__env->make('fronted.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Footer Shipping Area End Here -->
</div>
<?php echo $__env->make('fronted.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>

<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/checkout/payment.blade.php ENDPATH**/ ?>