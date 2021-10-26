<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Danh Mục', 'key' => 'Danh Sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                <th scope="col">Tên Danh mục</th>
                                <th scope="col">Mổ tả</th>
                                <th scope="col">Hiển thị</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php $__currentLoopData = $cate_trash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($cate->category_id); ?></th>
                                    <td><?php echo e($cate->name); ?></td>
                                    <td><?php echo e($cate->desc); ?></td>
                                    <td><span class="text-ellipsis">
                               
                                            
                                            <?php

                                            if($cate->status==0){
                                            ?>
                                            
                                    <a href="<?php echo e(route('categories.unactive',['category_id'=>$cate->category_id])); ?>"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                    <?php
                                            }else{

                                            ?>
                                            
                                    <a href="<?php echo e(route('categories.active',['category_id'=>$cate->category_id])); ?>"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                    <?php
                                            }
                                            ?>
                                </span></td>
                                    <td>

                                        <a href="<?php echo e(route('categories.untrash',['id'=>$cate->category_id])); ?>"
                                           
                                           class="btn btn-danger ">Phục Hồi</a>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')" href="<?php echo e(route('categories.fordel',['id'=>$cate->category_id])); ?>"
                                           
                                           class="btn btn-danger ">Xóa vĩnh viễn</a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($cate_trash->links()); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/category/trash.blade.php ENDPATH**/ ?>