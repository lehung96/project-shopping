<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Sản Phẩm ', 'key' => 'Danh Sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                <th scope="col">ID</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh </th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php $__currentLoopData = $pro_trash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($pros->product_id); ?></th>
                                    <td><?php echo e($pros->product_name); ?></td>
                                    <td><?php echo e($pros->price); ?></td>
                                    <td>
                                        <img class="product_image_150_100" src="<?php echo e(asset('public/uploads/products/'. $pros->image)); ?>" alt="">
                                    </td>
                                    <td> <?php echo e($pros->name); ?></td>
                                    <td><span class="text-ellipsis">
                               
                                            
                                            <?php

                                            if($pros->status==0){
                                            ?>
                                            
                                    <a href="<?php echo e(route('products.unactive',['pro_id'=>$pros->product_id])); ?>"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                    <?php
                                            }else{

                                            ?>
                                            
                                    <a href="<?php echo e(route('products.active',['pro_id'=>$pros->product_id])); ?>"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                    <?php
                                            }
                                            ?>
                                </span></td>
                                    <td>

                                        <a href="<?php echo e(route('products.untrash',['id'=>$pros->product_id])); ?>"
                                           
                                           class="btn btn-danger ">Phục Hồi</a>

                                        <a onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="<?php echo e(route('products.fordel',['id'=>$pros->product_id])); ?>"
                                           
                                           class="btn btn-danger " style="margin-top: 10px">Xóa vĩnh viễn</a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($pro_trash->links()); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/products/trash.blade.php ENDPATH**/ ?>