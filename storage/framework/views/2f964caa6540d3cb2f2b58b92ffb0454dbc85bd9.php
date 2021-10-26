<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">

        <h1>User Edit</h1>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?php echo e(route('users.update', ['id' => $user->id])); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhập tên"
                                       value="<?php echo e($user->name); ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"
                                       class="form-control"
                                       name="email"
                                       placeholder="Nhập email"
                                       value="<?php echo e($user->email); ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control"
                                       name="password"
                                       placeholder="Nhập password"

                                >
                            </div>
                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>

                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            <?php echo e($rolesOfUser->contains('id', $role->id) ? 'selected' : ''); ?>

                                            value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
















<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>