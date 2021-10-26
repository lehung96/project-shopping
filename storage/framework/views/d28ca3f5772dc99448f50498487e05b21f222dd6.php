<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Sản phẩm', 'key' => 'sửa'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('products.update', ['id' => $product->product_id])); ?>" method="post"
              enctype="multipart/form-data">
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
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" onkeyup="ChangeToSlug();"
                                       id="slug"
                                
                                value="<?php echo e($product->product_name); ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SL sản phẩm </label>
                                <input type="text" value="<?php echo e($product->product_quantity); ?>" name="product_quantity"
                                       class="form-control price_format" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">số lượng đã bán</label>
                                <input type="text" name="product_sold" class="form-control price_format " id=""
                                       placeholder="Nhập số lượng đã bán"
                                       value="<?php echo e($product->product_sold); ?>"
                                >
                                
                                
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán </label>
                                <input type="length" value="<?php echo e($product->price); ?>" name="price"
                                       class="form-control price_format" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá khuyến mãi</label>
                                <input type="length" value="<?php echo e($product->promontion_price); ?>" name="promontion_price"
                                       class="form-control price_format" id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                <form action="">
                                    <label for="exampleInputEmail1">New (new = 1 sản phẩm mới, 0 là sản phẩm trước
                                        đó):</label>
                                    <input type="number" id="quantity" value="<?php echo e($product->new); ?>" name="new" min="0"
                                           max="1">
                                </form>
                            </div>

                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <input type="file"
                                       class="form-control-file"
                                       name="image"
                                >
                                <div class="col-md-4 feature_image_container">
                                    <div class="row">
                          
                                        <img class="feature_image"
                                             src="<?php echo e(URL::to('public/uploads/products/'.$product->image)); ?>" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                <select class="form-control select2_init" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    <?php echo $htmlOption; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">lượt xem</label>
                                <input type="text" name="views_count" class="form-control price_format "
                                       value="<?php echo e($product->views_count); ?>" id="" placeholder="Nhập lượt xem">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea style="resize: none" rows="8" class="form-control" name="desc"
                                          id="ckeditor2"><?php echo e($product->desc); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Từ khóa sản phẩm </label>
                                <textarea style="resize: none" rows="8" class="form-control" name="meta_keywords"
                                          id="ckeditor2"><?php echo e($product->meta_keywords); ?></textarea>
                            </div>
                            <div class="form-group bodercolor ">
                                <label for="exampleInputPassword1">Màu Sắc</label>
                                <div class="checkbox">
                                    <?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $da_color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <label> <input type="checkbox" value="<?php echo e($da_color->attribute_id); ?>"
                             
                                 
                            
                                    name="id_attr[]" <?php echo e((in_array($da_color->attribute_id,$id_attr)?'checked':'')); ?>>
                                            
                                            <i class="nav-icon fas fa-square" style="color:<?php echo e($da_color->value); ?>"></i>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Dung tích</label>
                                <div class="checkbox">
                                    <?php $__currentLoopData = $capaci; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $da_size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label> <input type="checkbox" value="<?php echo e($da_size->attribute_id); ?>"
                                                       name="id_attr[]" <?php echo e((in_array($da_size->attribute_id,$id_attr)?'checked':'')); ?>>
                                            <?php echo e($da_size->value); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nhà sản xuất</label>
                                <div class="checkbox">
                                    <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $da_brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label> <input type="checkbox" value="<?php echo e($da_brand->attribute_id); ?>"
                                                       name="id_attr[]" <?php echo e((in_array($da_brand->attribute_id,$id_attr)?'checked':'')); ?>>
                                            <?php echo e($da_brand->value); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nhập nội dung</label>
                                <textarea id="my-editor" name="contents" class="form-control "
                                          rows="8"><?php echo e($product->content); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary mb-3">Cập nhật sản phẩm</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>