<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Menu', 'key' => 'Danh Sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content">
            <a href="<?php echo e(route('menus.trash')); ?>"
                    data-url=""
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
                           
                            <a href="<?php echo e(route('menus.create')); ?>" class="btn btn-success float-right m-2">Thêm</a>

                    </div>
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Menu</th>
                                <th scope="col">parent_id</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($menu->id); ?></th>
                                <td><?php echo e($menu->name); ?></td>
                                <td><?php echo e($menu->parent_id); ?></td>



















                                <td>
                                        <a href="<?php echo e(route('menus.edit',['id'=>$menu->id])); ?>"
                                           class="btn btn-default">Sửa</a>
                                        <a href="<?php echo e(route('menus.delete',['id'=>$menu->id])); ?>"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($menus->links()); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/menus/index.blade.php ENDPATH**/ ?>