<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="<?php echo e(route('roles.store')); ?>" method="post" enctype="multipart/form-data" style="width: 100%;">
                        <div class="col-md-12">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Tên vai trò</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhập tên vai trò"
                                       value="<?php echo e(old('name')); ?>"
                                >

                            </div>

                            <div class="form-group">
                                <label>Mô tả vai trò</label>

                                <textarea
                                    class="form-control"
                                    name="display_name" rows="4"><?php echo e(old('display_name')); ?></textarea>

                            </div>


                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>
                                        <input type="checkbox" class="checkall">
                                        checkall
                                    </label>
                                </div>


                                    <div class="card border-primary mb-3 col-md-12">
                                        <div class="card-header">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label>

                                        </div>
                                        <div class="row">

                                                <div class="card-body text-primary col-md-3">
                                                    <h5 class="card-title">
                                                        <label>
                                                            <input type="checkbox" name="permission_id[]"
                                                                   class="checkbox_childrent"
                                                                   value="">
                                                        </label>

                                                    </h5>
                                                </div>

                                        </div>
                                    </div>



                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>










<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/role/add.blade.php ENDPATH**/ ?>