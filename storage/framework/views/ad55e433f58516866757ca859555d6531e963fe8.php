<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Phục hồi', 'key' => 'Menus'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                <th scope="col">Tên Menu</th>
                                <th scope="col">Hiển thị</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            <?php $__currentLoopData = $menu_trash; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($menu->id); ?></th>
                                    <td><?php echo e($menu->name); ?></td>

                               
                                            
















                                    <td>

                                        <a href="<?php echo e(route('menus.untrash',['id'=>$menu->id])); ?>"
                                           
                                           class="btn btn-danger ">Phục Hồi</a>
                                        <a onclick="return confirm('Bạn có chắc muốn xóa menu này không?')" href="<?php echo e(route('menus.fordel',['id'=>$menu->id])); ?>"
                                           
                                           class="btn btn-danger ">Xóa vĩnh viễn</a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($menu_trash->links()); ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/menus/trash.blade.php ENDPATH**/ ?>