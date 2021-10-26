<?php $__env->startSection('main_content'); ?>
        <div class="content-wrapper">
            <?php echo $__env->make('backend.content-header', ['name' => 'sửa ', 'key' => 'danh mục bài viết'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="content">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
                <div class="container-fluid">
                    <div class="row">

                            <div class="col-md-6 offset-3">
                                <form role="form" action="<?php echo e(URL::to('/update-category-post/'.$category_post->cate_post_id)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <input type="text" name="cate_post_name" value="<?php echo e($category_post->cate_post_name); ?>" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Slug</label>
                                        <input type="text" name="cate_post_slug"  value="<?php echo e($category_post->cate_post_slug); ?>" class="form-control" id="convert_slug" placeholder="Slug">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                                        <textarea style="resize: none" rows="8" class="form-control" name="cate_post_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"><?php echo e($category_post->cate_post_desc); ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Hiển thị</label>
                                        <select name="cate_post_status" class="form-control input-sm m-bot15">
                                            <?php if($category_post->cate_post_status==0): ?>
                                                <option selected value="0">Hiển thị</option>
                                                <option value="1">Ẩn</option>
                                            <?php else: ?>
                                                <option value="0">Hiển thị</option>
                                                <option selected value="1">Ẩn</option>
                                            <?php endif; ?>


                                        </select>
                                    </div>

                                    <button type="submit" name="update_post_cate" class="btn btn-info">Cập nhật danh mục bài viết</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>

        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/category_post/edit_category.blade.php ENDPATH**/ ?>