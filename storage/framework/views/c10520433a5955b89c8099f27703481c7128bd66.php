<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Thương Hiệu', 'key' => 'danh sách'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                            <a href="<?php echo e(route('brands.create')); ?>" class="btn btn-success float-right m-2">Add</a>

                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            <table class="table table-striped b-t b-light">
                                <thead>
                                <tr>
                                    <th>Tên thương hiệu</th>
                                    <th>Slug</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Hiển thị</th>
                                    <th style="width:30px;"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $all_brand_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $brand_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                                        <td><?php echo e($brand_pro->brand_name); ?></td>
                                        <td><?php echo e($brand_pro->slug); ?></td>
                                        <td><img src="public/uploads/brand/<?php echo e($brand_pro->brand_image); ?>" height="100" width="100"></td>
                                        <td><span class="text-ellipsis">
              <?php
                                                if($brand_pro->brand_status==0){
                                                ?>
                <a href="<?php echo e(URL::to('/unactive-brand-products/'.$brand_pro->brand_id)); ?>"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                                                }else{
                                                ?>
                 <a href="<?php echo e(URL::to('/active-brand-products/'.$brand_pro->brand_id)); ?>"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
                                                }
                                                ?>
            </span></td>

                                        <td>

                                            <a href="<?php echo e(route('brands.edit',['id'=>$brand_pro->brand_id])); ?>" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-pencil-square-o text-success text-active"></i>sửa</a>
                                            <a onclick="return confirm('Bạn có chắc là muốn xóa thương hiệu này ko?')" href="<?php echo e(route('brands.delete',['id'=>$brand_pro->brand_id])); ?>" class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-times text-danger text"></i>Xóa</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">

                    </div>

                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/brand/index.blade.php ENDPATH**/ ?>
