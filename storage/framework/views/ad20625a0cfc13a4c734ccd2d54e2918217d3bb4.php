<?php $__env->startSection('main_content'); ?>

<div class="content-wrapper">


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success float-right m-2"> Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên</th>
                            <th scope="col">email</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <th scope="row"><?php echo e($user->id); ?></th>
                                <td><?php echo e($user->name); ?></td>
                                <td><?php echo e($user->email); ?></td>

                                <td>
                                    <a href="<?php echo e(route('users.edit', ['id' => $user->id])); ?>"
                                       class="btn btn-default">Edit</a>
                                    <a href="<?php echo e(route('users.delete', ['id' => $user->id])); ?>"
                                       data-url=""
                                       class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <?php echo e($users->links()); ?>

                </div>

            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/user/index.blade.php ENDPATH**/ ?>