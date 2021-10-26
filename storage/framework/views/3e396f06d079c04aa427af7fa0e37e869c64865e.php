
<!-- Begin Quick View | Modal Area -->
<div class="modal fade modal-wrapper"  id="xemnhanh">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <style type="text/css">
                    span#product_quickview_content img {
                        width: 100%;
                    }

                    @media  screen and (min-width: 768px) {
                        .modal-dialog {
                            width: 700px; /* New width for default modal */
                        }
                        .modal-sm {
                            width: 350px; /* New width for small modal */
                        }
                    }

                    @media  screen and (min-width: 992px) {
                        .modal-lg {
                            width: 1200px; /* New width for large modal */
                        }
                    }
                </style>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <span id="product_quickview_image"></span>
                            <span id="product_quickview_gallery"></span>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">

                                <h2><span id="product_quickview_title"></span></h2>
                                <p>Mã ID: <span id="product_quickview_id"></span></p>
                                <p style="font-size: 20px; color: brown;font-weight: bold;">Giá sản phẩm : <span id="product_quickview_price"></span></p>

                                <form class="cart-quantity" style="margin-bottom: 20px"  method="post">
                                    <?php echo csrf_field(); ?>
                                    <div id="product_quickview_value"></div>


                                    <div class="cart_product_qty_">
                                        <label style="font-size: 20px; color: brown;font-weight: bold;">chọn số lượng</label>
                                        <div class="cart-plus-minus">
                                            
                                            <input name="qty" type="number" min="1" class="cart_product_qty_"  value="1" />
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>




                                </form>

                                <h4 style="font-size: 20px; color: brown;font-weight: bold;">Mô tả sản phẩm</h4>
                                <hr>
                                <p><span id="product_quickview_desc"></span></p>
                                <p><span id="product_quickview_content"></span></p>

                                <div id="product_quickview_button"></div>
                                <div id="beforesend_quickview"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                <button type="button" class="btn btn-default redirect-cart">Đi tới giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View | Modal Area End Here -->
<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/pages/product/product_detail/list_detail.blade.php ENDPATH**/ ?>