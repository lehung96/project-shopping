<?php $__env->startSection('main_content'); ?>

    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'ảnh sản phẩm', 'key' => 'Thêm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('sellslider.create')); ?>" class="btn btn-success float-right m-2"> Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên ảnh bán</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Product_id</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $s_sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell_slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <th scope="row"><?php echo e($sell_slider->id); ?></th>
                                    <td><?php echo e($sell_slider->name); ?></td>
                                    <td>
                                        <img class="product_image_180_280" src="<?php echo e(asset('public/uploads/sellslide/'. $sell_slider->image)); ?>" alt="">
                                    </td>
                                    <td><?php echo e($sell_slider->product_id); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('sellslider.edit',['id'=>$s_sliders->id])); ?>"
                                           class="btn btn-default">Sửa</a>
                                        <a href="<?php echo e(route('sellslider.delete',['id'=>$s_sliders->id])); ?>"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($s_sliders->links()); ?>

                    </div>

                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/sellslider/index.blade.php ENDPATH**/ ?>