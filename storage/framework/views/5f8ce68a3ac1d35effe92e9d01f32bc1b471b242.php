<?php $__env->startSection('main_content'); ?>

    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Slider', 'key' => 'Thêm'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo e(route('slider.create')); ?>" class="btn btn-success float-right m-2"> Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">giảm giá</th>
                                <th scope="col">giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">nội dung & thời gian</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <th scope="row"><?php echo e($slider->id); ?></th>
                                    <td><?php echo e($slider->name); ?></td>
                                    <td><?php echo e($slider->description); ?></td>
                                    <td><?php echo e(number_format((float)$slider->discount)); ?> VNĐ</td>
                                    <td><?php echo e(number_format((float)$slider->price)); ?> VNĐ</td>
                                    <td>
                                        <img class="product_image_180_280" src="<?php echo e(asset('public/uploads/slider/'. $slider->image_name)); ?>" alt="">
                                    </td>
                                    <td><?php echo e($slider->content_time); ?></td>

                                    <td>
                                        <a href="<?php echo e(route('slider.edit',['id'=>$slider->id])); ?>"
                                           class="btn btn-default">Sửa</a>
                                        <a href="<?php echo e(route('slider.delete',['id'=>$slider->id])); ?>"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                    </td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo e($sliders->links()); ?>

                    </div>

                </div>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>