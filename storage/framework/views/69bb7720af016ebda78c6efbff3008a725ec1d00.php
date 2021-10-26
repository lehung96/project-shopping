<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">

        <?php echo $__env->make('backend.content-header', ['name' => 'Thuộc tính', 'key' => 'Danh Sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                        
                            <a href="<?php echo e(route('attributes.create')); ?>" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Thuộc tính</th>
                                <th scope="col">giá trị</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($attribute->attribute_id); ?></th>
                                <td><?php echo e($attribute->name); ?></td>
                                <td><?php echo e($attribute->value); ?></td>




















                                <td>
                                        <a href="<?php echo e(route('attributes.edit',['id'=>$attribute->attribute_id])); ?>"
                                           class="btn btn-default">Sửa</a>
                                        <a href="<?php echo e(route('attributes.delete',['id'=>$attribute->attribute_id])); ?>"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>


















                    </div>
                    <div class="col-md-12" STYLE="padding-top: 10px">
                        <?php echo e($attributes->links()); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/attributes/index.blade.php ENDPATH**/ ?>