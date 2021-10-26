<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">

        <?php echo $__env->make('backend.content-header', ['name' => 'Sản Phẩm ', 'key' => 'Danh Sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-md-12">
                <form class="form-inline" action="" style=" padding-left: 15px">
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Tên sản phẩm...." name="name" value="<?php echo e(\Request::get('name')); ?>">
                    </div>

                    <div class="form-group">
                        <select name="names" id="" class="form-control">
                            <option value="">Danh mục</option>
                            <?php if(isset($htmlOption)): ?>
                                <?php $__currentLoopData = $htmlOption; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cates->category_id); ?>" <?php echo e(\Request::get('names')== $cates->category_id ? "selected ='selected'" :""); ?>"><?php echo e($cates->name); ?></option>
                                    <?php echo $htmlOption; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="content">
            <a href="<?php echo e(route('products.trash')); ?>"
               
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
                        
                        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Sản Phẩm</th>
                                <th>Thư viện ảnh</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Gía bán</th>
                                <th scope="col">Gía khuyến mãi</th>
                                <th scope="col">Hình ảnh</th>

                                <th scope="col">Danh mục</th>
                                <th scope="col">Sản phẩm mới</th>
                                <th scope="col">Lượt xem</th>
                                <th scope="col">Hiển thị</th>
                                <th scope="col">Hoạt động</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <th scope="row"><?php echo e($pro->product_id); ?></th>
                                    <td><?php echo e($pro->product_name); ?></td>
                                    

                                    <td><a href="<?php echo e(url('/add-gallery/'.$pro->product_id)); ?>">Thêm thư viện ảnh</a></td>
                                    <td><?php echo e($pro->product_quantity); ?></td>
                                    <td><?php echo e(number_format($pro->price)); ?> vnđ</td>
                                    <td><?php echo e(number_format((float)$pro->promontion_price)); ?> %</td>
                                    <td>
                                        <img class="product_image_150_100" src="<?php echo e(asset('public/uploads/products/'. $pro->image)); ?>" alt="">
                                    </td>


                                    <td> <?php echo e($pro->name); ?></td>
                                    <td> <?php echo e($pro->new); ?></td>
                                    <td> <?php echo e($pro->views_count); ?></td>

                                    
                                    


                                    


                                    <td><span class="text-ellipsis">


                                            <?php

                                            if($pro->status==0){
                                            ?>
                                            
                                    <a href=""><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>


                                    <?php
                                            }else{

                                            ?>
                                            
                                    <a href=""><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>

                                    <?php
                                            }
                                            ?>


                                </span></td>
                                    <td>
                                        <a href="<?php echo e(route('products.edit',['id'=>$pro->product_id])); ?>"
                                           class="btn btn-default">Sửa</a>
                                        <a href="<?php echo e(route('products.delete',['id'=>$pro->product_id])); ?>"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <!----- Form import data (form nhập dữ liệu từ file Excel )---->
                        <!-----form có url('products.import-csv') url là đường dẫn đến trang ('products.import-csv' phương thức gửi là post)
                        enctype="multipart/form-data" là gửi file---->
                        <form action="<?php echo e(route('products.import-csv')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!----và nhận file .xlsx----->
                            <!----Thẻ input này dùng để chon tệp----->
                            <input STYLE="padding-bottom: 10px" type="file" name="file" accept=".xlsx"><br>

                            <input  type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
                        </form>
                        <!----- Form  export data (form xuất dữ liệu ra file Excel)
                        form có url('products.export-csv') url là đường dẫn đến trang ('products.export-csv' phương thức gửi là post)---->
                        <form action="<?php echo e(route('products.export-csv')); ?>" method="POST" STYLE="padding-top: 10px">
                            <?php echo csrf_field(); ?>
                            <input  type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
                        </form>

                    </div>
                    <div class="col-md-12" STYLE="padding-top: 10px">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/products/index.blade.php ENDPATH**/ ?>