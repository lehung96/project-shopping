<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('roles.create')); ?>" class="btn btn-success float-right m-2"> Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Mô tả vai trò</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <th scope="row"><?php echo e($role->id); ?></th>
                                    <td><?php echo e($role->name); ?></td>
                                    <td><?php echo e($role->display_name); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('roles.edit', ['id' => $role->id])); ?>"
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url=""
                                           class="btn btn-danger action_delete">Delete</a>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($roles->links()); ?>

                    </div>

                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/role/index.blade.php ENDPATH**/ ?>