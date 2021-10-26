<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Thuộc tính', 'key' => 'Edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <?php $__currentLoopData = $edit_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $edit_attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 offset-3">
                            <form action="<?php echo e(route('attributes.update', ['id' => $edit_attribute->attribute_id])); ?>"
                                  method="post">
                                <?php echo csrf_field(); ?>

                                <?php

                                if($edit_attribute->name == 'kích thước'){
                                ?>
                                <label for="exampleInputPassword1">Tên tên thuộc tính</label>
                                <div name="name" id="inputName" class="form-control input-sm m-bot15">
                                    <option value="kích thước">Kích thước</option>
                                </div>
                                <br>
                                <div class="form-group value1">
                                    <label>Gía trị</label>
                                    <input type="text" class="form-control" name="value" id="v1"
                                       value="<?php echo e($edit_attribute->value); ?>" placeholder="Nhập giá trị">
                                </div>

                                <?php
                                }else if ($edit_attribute->name == 'Nhà sản xuất'){

                                ?>
                                <label for="exampleInputPassword1">Tên tên thuộc tính</label>
                                <div name="name" id="inputName" class="form-control input-sm m-bot15">
                                    <option value="Nhà sản xuất">Nhà sản xuất</option>
                                </div>
                                <br>
                                <div class="form-group value1">
                                    <label>Gía trị</label>
                                    <input type="text" class="form-control" name="value" id="v1"
                                           value="<?php echo e($edit_attribute->value); ?>" placeholder="Nhập giá trị">
                                </div>

                                <?php
                                }else{
                                ?>
                                <label for="exampleInputPassword1">Tên tên thuộc tính</label>
                                <div name="name" id="inputName" class="form-control input-sm m-bot15">
                                    <option value="màu sắc">màu sắc</option>
                                </div>
                                <br>
                                <div class="form-group value1">
                                    <label>Gía trị</label>
                                    <input type="color" class="form-control" name="value" id="v1"
                                           value="<?php echo e($edit_attribute->value); ?>" placeholder="Nhập giá trị">
                                </div>
                                <?php
                                }
                                ?>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/attributes/edit.blade.php ENDPATH**/ ?>