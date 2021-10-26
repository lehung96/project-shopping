<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Danh Sách  ', 'key' => 'Danh mục bài viết'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="table-agile-info">
            <div class="panel panel-default">

                <div class="table-responsive">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>

                    <div class="col-md-12">
                        
                        <a href="<?php echo e(URL::to('/add-post')); ?>" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <table class="table table-striped b-t b-light" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th>Tên bài viết</th>
                            <th>Hình ảnh</th>
                            <th>Slug</th>
                            <th>Mô tả bài viết</th>
                            <th>Từ khóa bài viết</th>
                            <th>Danh mục bài viết</th>
                            <th>Hiển thị</th>

                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $all_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row"><?php echo e($post->post_id); ?></th>
                                <td><?php echo e($post->post_title); ?></td>
                                <td><img src="<?php echo e(asset('public/uploads/post/'.$post->post_image)); ?>" height="100"
                                         width="100"></td>
                                <td><?php echo e($post->post_slug); ?></td>
                                <td><?php echo $post->post_desc; ?></td>
                                <td><?php echo e($post->post_meta_keywords); ?></td>
                                
                                <td>
                                    <?php if($post->post_status==0): ?>
                                        Hiển thị
                                    <?php else: ?>
                                        Ẩn
                                    <?php endif; ?>
                                </td>

                                <td>

                                    <a href="<?php echo e(URL::to('/edit-post/'.$post->post_id)); ?>"
                                       class="btn btn-default">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')"
                                       href="<?php echo e(URL::to('/delete-post/'.$post->post_id)); ?>"
                                       data-url=""
                                       class="btn btn-danger ">Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/post/list_post.blade.php ENDPATH**/ ?>