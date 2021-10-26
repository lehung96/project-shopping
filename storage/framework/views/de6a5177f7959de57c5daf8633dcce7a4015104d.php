<?php $__env->startSection('main_content'); ?>

    <div class="content-wrapper">
            <?php echo $__env->make('backend.content-header', ['name' => 'Danh sách', 'key' => 'Vai trò user'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="content">
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span style="color: red; font-size: 20px"  class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="margin-top:5px">

                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th>Tên user</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Password</th>
                                <th>admin</th>
                                <th>user</th>
                                <th>developer</th>
                                <th>content</th>

                                <th style="width:30px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                                <form action="<?php echo e(url('/assign-roles')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <tr>

                                        <th scope="row"><?php echo e($user->admin_id); ?></th>
                                        <td><?php echo e($user->admin_name); ?></td>
                                        <td>
                                            <?php echo e($user->admin_email); ?>

                                            <input type="hidden" name="admin_email" value="<?php echo e($user->admin_email); ?>">
                                            <input type="hidden" name="admin_id" value="<?php echo e($user->admin_id); ?>">
                                        </td>
                                        <td><?php echo e($user->admin_phone); ?></td>
                                        <td><?php echo e($user->admin_password); ?></td>
                                        
                                        <td><input type="checkbox" name="admin_role" <?php echo e($user->hasRole('admin') ? 'checked' : ''); ?>></td>
                                        <td><input type="checkbox" name="user_role"  <?php echo e($user->hasRole('user') ? 'checked' : ''); ?>></td>
                                        <td><input type="checkbox" name="dev_role"  <?php echo e($user->hasRole('dev') ? 'checked' : ''); ?>></td>
                                        <td><input type="checkbox" name="content_role"  <?php echo e($user->hasRole('content') ? 'checked' : ''); ?>></td>

                                        <td>


                                            <p><input type="submit" value="Phân quyền" class="btn btn-sm btn-default"></p>
                                            <p><a style="margin:5px 0;" class="btn btn-sm btn-danger" href="<?php echo e(url('/delete-user-roles/'.$user->admin_id)); ?>">Xóa user</a></p>
                                            <p><a style="margin:5px 0;" class="btn btn-sm btn-success" href="<?php echo e(url('/impersonate/'.$user->admin_id)); ?>">Chuyển quyền</a></p>

                                        </td>

                                    </tr>
                                </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo $admin->links(); ?>

                    </div>

                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/users/all_users.blade.php ENDPATH**/ ?>