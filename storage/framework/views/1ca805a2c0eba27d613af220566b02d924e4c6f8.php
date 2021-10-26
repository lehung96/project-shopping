<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'menu', 'key' => 'Sửa'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                    <div class="col-md-6">
                        
                        <form action="<?php echo e(route('menus.update', ['id' => $menuFollowIdEdit->id])); ?>" method="post">
                            
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Tên menus</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhập tên menu"
                                       value="<?php echo e($menuFollowIdEdit->name); ?>"
                                >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>

                                <input type="text" name="slug" value="<?php echo e($menuFollowIdEdit->slug); ?>" class="form-control" id="convert_slug" placeholder="Tên menu">
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            

                            
                            
                            
                            

                            
                            
                            
                            
                            
                            
                            


                            
                            
                            <div class="form-group">
                                <label>Chọn menus cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">Chọn menu cha</option>
                                    <?php echo $optionSelect; ?>

                                </select>
                            </div>


                            <button type="submit" name="add_category" class="btn btn-primary">Thêm Menu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/menus/edit.blade.php ENDPATH**/ ?>