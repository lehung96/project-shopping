<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Thêm ', 'key' => 'danh mục bài viết'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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

                    <div class="col-md-6 offset-3">
                        <form role="form" action="<?php echo e(URL::to('/update-post/'.$post->post_id)); ?>" method="post"
                              enctype='multipart/form-data'>
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên bài viết</label>
                                <input type="text" name="post_title" data-validation="length"
                                       data-validation-length="min10"
                                       data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" class="form-control"
                                       onkeyup="ChangeToSlug();" value="<?php echo e($post->post_title); ?>" id="slug"
                                       placeholder="Tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="post_slug" value="<?php echo e($post->post_slug); ?>" class="form-control"
                                       id="convert_slug" placeholder="Slug">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="post_desc"
                                          id="summernotes2" placeholder="Mô tả danh mục"><?php echo e($post->post_desc); ?></textarea>
                            </div>

                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <label for="exampleInputPassword1">Nội dung bài viết</label>
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                         <textarea style="resize: none" rows="8" class="form-control" name="post_content"
                                                   id="summernotes1" placeholder="Mô tả danh mục"><?php echo e($post->post_content); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta từ khóa</label>
                                <textarea style="resize: none" rows="5" class="form-control" name="post_meta_keywords"
                                          id="exampleInputPassword1"
                                          placeholder="Mô tả danh mục"><?php echo e($post->post_meta_keywords); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Meta nội dung</label>
                                <textarea style="resize: none" rows="5" class="form-control" name="post_meta_desc"
                                          id="exampleInputPassword1"
                                          placeholder="Mô tả danh mục"><?php echo e($post->post_meta_desc); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                                <input type="file" name="post_image" class="form-control" id="exampleInputEmail1">
                                <img src="<?php echo e(asset('public/uploads/post/'.$post->post_image)); ?>" height="100" width="100">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục bài viết</label>
                                <select name="cate_post_id" class="form-control input-sm m-bot15">
                                    <?php $__currentLoopData = $cate_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                            <?php echo e($post->cate_post_id==$cate->cate_post_id ? 'selected' : ''); ?> value="<?php echo e($cate->cate_post_id); ?>"><?php echo e($cate->cate_post_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="post_status" class="form-control input-sm m-bot15">
                                    <?php if($post->post_status==0): ?>
                                        <option selected value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                    <?php else: ?>
                                        <option value="0">Hiển thị</option>
                                        <option selected value="1">Ẩn</option>
                                    <?php endif; ?>


                                </select>
                            </div>
                            <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật bài
                                viết
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/post/edit_post.blade.php ENDPATH**/ ?>