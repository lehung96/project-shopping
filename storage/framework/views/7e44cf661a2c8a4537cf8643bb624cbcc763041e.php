<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">

        <?php echo $__env->make('backend.content-header', ['name' => 'Danh Mục', 'key' => 'Danh Sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content">
            <a href="<?php echo e(route('categories.trash')); ?>"
               
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
                        
                            <a href="<?php echo e(route('categories.create')); ?>" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Danh mục</th>
                                <th scope="col">Tên Slug</th>
                                <th scope="col">Từ khóa danh mục</th>
                                <th scope="col">Mô tả danh mục</th>
                                <th scope="col">Hiển thị</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($cate->category_id); ?></th>
                                <td><?php echo e($cate->name); ?></td>
                                <td><?php echo e($cate->slug); ?></td>
                                <td><?php echo e($cate->meta_keywords); ?></td>
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
                                        <a href="<?php echo e(route('categories.edit',['id'=>$cate->category_id])); ?>"
                                           class="btn btn-default">Sửa</a>
                                        <a href="<?php echo e(route('categories.delete',['id'=>$cate->category_id])); ?>"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <!----- Form import data (form nhập dữ liệu từ file Excel )---->
                        <!-----form có url('categories.import-csv') url là đường dẫn đến trang ('categories.import-csv' phương thức gửi là post)
                        enctype="multipart/form-data" là gửi file---->
                        <form action="<?php echo e(route('categories.import-csv')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <!----và nhận file .xlsx----->
                                <!----Thẻ input này dùng để chon tệp----->
                            <input STYLE="padding-bottom: 10px" type="file" name="file" accept=".xlsx"><br>

                            <input  type="submit" value="Import file Excel" name="import_csv" class="btn btn-warning">
                        </form>
                        <!----- Form  export data (form xuất dữ liệu ra file Excel)
                        form có url('categories.export-csv') url là đường dẫn đến trang ('categories.export-csv' phương thức gửi là post)---->
                        <form action="<?php echo e(route('categories.export-csv')); ?>" method="POST" STYLE="padding-top: 10px">
                            <?php echo csrf_field(); ?>
                            <input  type="submit" value="Export file Excel" name="export_csv" class="btn btn-success">
                        </form>

                    </div>
                    <div class="col-md-12" STYLE="padding-top: 10px">
                        <?php echo e($categorys->links()); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/category/index.blade.php ENDPATH**/ ?>