<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <style type="text/css">
                    p.title_thongke {
                        text-align: center;
                        font-size: 20px;
                        font-weight: bold;
                    }
                </style>
                <p class="title_thongke">Thống kê đơn hàng doanh số</p>

                <form autocomplete="off">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        
                        <form autocomplete="off">
                            <?php echo csrf_field(); ?>
                            <div class="col-md-3">
                                <label>Từ ngày:</label>
                                
                                
                                
                                
                                <input type="text" id="datepicker" class="form-control">
                                

                                <label> <input  type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm"
                                                value="Lọc kết quả"></label>
                            </div>

                            <div class="col-md-3">
                                <label>Đến ngày:</label>
                                
                                
                                
                                
                                <input type="text" id="datepicker2" class="form-control">

                            </div>
                         <!-- lọc bằng Ajax  Biểu đồ doanh số theo ngày tuần tháng năm  -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Lọc theo:</label>

                                            <div class="input-group">
                                                <!--dùng class="dashboard-filter" dashboard-filter để gắn ajax vào
                                                -->
                                                <select class="dashboard-filter form-control" >
                                                    <option>--Chọn--</option>
                                                    <option value="7ngay">7 ngày qua</option>
                                                    <option value="thangtruoc">tháng trước</option>
                                                    <option value="thangnay">tháng này</option>
                                                    <option value="365ngayqua">365 ngày qua</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- /.form group -->
                                </div>
                        </form>

                        
                        
                        <div class="col-md-12">
                            

                            <div id="chart" style="height: 250px;"></div>
                        </div>
                    </div>
                </form>





































                <div class="row" style="background-color: #93d4e6">

                    <div class="col-md-6 col-xs-12">
                        <p class="title_thongke">Thống kê tổng sản phẩm, đơn hàng, Khách hàng</p>
                        <div id="donut"></div>
                    </div>

                    <!--------------------------->














                    <div class="col-md-6 col-xs-12">
                        <style type="text/css">
                            ol.list_views {
                                margin: 10px 0;
                                color: #fff;
                            }
                            ol.list_views a:hover {
                                color: #2b2a2a;
                                font-weight: 400;
                            }
                        </style>
                        <h3>Sản phẩm xem nhiều</h3>
                        
                        <ol class="list_views">
                            <?php $__currentLoopData = $product_views; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a target="_blank" href="<?php echo e(route('products-detail-view',['product_id'=>$pro->product_id])); ?>"><?php echo e($pro->product_name); ?> | <span style="color:black"><?php echo e($pro->views_count); ?></span></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ol>

                    </div>
                </div>
            </div>

            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/dashboard/home_dashboard.blade.php ENDPATH**/ ?>