<?php $__env->startSection('main_content'); ?>









































































    <div class="content-wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thư viện ảnh
                </header>
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo '<span class="text-alert">' . $message . '</span>';
                    Session::put('message', null);
                }
                ?>
                <form action="<?php echo e(url('/insert-gallery/'.$pro_id)); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-3" align="right">

                        </div>
                        <div class="col-md-6">
                            <input type="file" class="form-control" id="file" name="file[]" accept="image/*" multiple>
                            <span id="error_gallery"></span>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="upload" name="taianh" value="Tải ảnh" class="btn btn-success ">
                        </div>

                    </div>
                </form>

                <div class="panel-body ">
                    <input type="hidden" value="<?php echo e($pro_id); ?>" name="pro_id" class="pro_id">
                    <form>
                        <?php echo csrf_field(); ?>
                        <div id="gallery_load">

                        </div>
                    </form>

                </div>
            </section>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/gallery/add_gallery.blade.php ENDPATH**/ ?>