<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'products', 'key' => 'Add'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-12">
            
            
            
            
            
            
            
            
            
        </div>
        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span class="text-alert">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>
        <form action="<?php echo e(route('products.store')); ?>" method="post"
              enctype="multipart/form-data">
            <div class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 offset-3">
                            

                            
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Tên sản phẩm </label>
                                <input type="text"
                                       
                                       class="form-control <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       name="product_name"
                                       placeholder="Nhập tên sản phẩm "
                                       value="<?php echo e(old('product_name')); ?>"
                                >
                                <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SL sản phẩm</label>
                                <input type="text" name="product_quantity"
                                       class="form-control price_format <?php $__errorArgs = ['product_quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="" placeholder="Điền số lượng"
                                       value="<?php echo e(old('product_quantity')); ?>">
                                <?php $__errorArgs = ['product_quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">số lượng đã bán</label>
                                <input type="text" name="product_sold" class="form-control price_format " id=""
                                       placeholder="Nhập số lượng đã bán"
                                >
                                
                                
                                
                            </div>
                            
                            
                            
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="length" name="price"
                                       class="form-control price_format <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id=""
                                       placeholder="Nhập giá"
                                       value="<?php echo e(old('price')); ?>">
                                <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá khuyến mãi</label>
                                <input type="length" name="promontion_price"
                                       class="form-control price_format <?php $__errorArgs = ['promontion_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                       id="" placeholder="Nhập giá khuyễn mãi"
                                       value="<?php echo e(old('promontion_price')); ?>">
                                <?php $__errorArgs = ['promontion_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <form action="">
                                    <label for="exampleInputEmail1">New (new = 1 sản phẩm mới, 0 là sản phẩm trước
                                        đó):</label>
                                    <input type="number" id="quantity" name="new" min="0" max="1">
                                </form>
                            </div>

                            <div class="col-md-12">
                                <div class="card card-outline card-info">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <textarea id="summernotes" style="resize: none" rows="8"
                                                  class="form-control  <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="desc"
                                                  id="exampleInputPassword1"
                                                  placeholder="Mô tả sản phẩm"><?php echo e(old('desc')); ?>

                                        </textarea>
                                        <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="alert alert-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Từ khóa sản phẩm </label>
                                
                                <textarea style="resize: none" rows="8"
                                          class="form-control  <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          name="meta_keywords" id="exampleInputPassword1"
                                          placeholder="từ khóa sản phẩm"><?php echo e(old('meta_keywords')); ?></textarea>

                                <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ảnh đại diện</label>
                                
                                <input type="file" name="image" class="form-control-file" id="exampleInputEmail1">
                            </div>
                            
                            
                            
                            
                            

                            
                            

                            <div class="form-group">
                                <label>Chọn danh mục</label>
                                
                                <select class="form-control select2_init <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        name="category_id">
                                    
                                    <option value="">Chọn danh mục</option>

                                    <?php echo $htmlOption; ?>

                                </select>
                                <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">lượt xem</label>
                                <input type="text" name="views_count" class="form-control price_format " id=""
                                       placeholder="Nhập lượt xem">
                            </div>
                            
                            
                            

                            
                            
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hiển thị</label>
                                <select name="pro_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                </select>
                            </div>

                            <div class="form-group bodercolor ">
                                <label for="exampleInputPassword1">Màu Sắc</label>
                                <div class="checkbox">
                                    <?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $da_color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <label> <input type="checkbox" value="<?php echo e($da_color->attribute_id); ?>"
                                                       name="id_attr[]">
                                            
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
                                                       name="id_attr[]">
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
                                                       name="id_attr[]">
                                            <?php echo e($da_brand->value); ?>

                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                        </div>
















                                <div class="col-md-12">
                                    <div class="card card-outline card-info">
                                        <div class="card-header">
                                            <h3 class="card-title">
                                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                            </h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <textarea id="summernote" style="resize: none" rows="8" class="<?php $__errorArgs = ['contents'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control tinymce_editor_init " name="contents"
                                                      placeholder="Nội dung sản phẩm">
                                                  <?php echo e(old('contents')); ?>

                                            </textarea>
                                            <?php $__errorArgs = ['contents'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="alert alert-danger"><?php echo e($message); ?>

                                            </div>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>

                                    </div>
                                </div>


                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mb-3">Thêm sản phẩm</button>
                    </div>

                </div>
            </div>
        </form>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/products/add.blade.php ENDPATH**/ ?>