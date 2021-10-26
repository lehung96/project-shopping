<?php $__env->startSection('main_content'); ?>
    <div class="content-wrapper">
        <?php echo $__env->make('backend.content-header', ['name' => 'Thuộc tính', 'key' => 'Add'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-md-12">









        </div>
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
                        
                        <form action="<?php echo e(route('attributes.store')); ?>" method="post">
                            
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tên tên thuộc tính</label>
                                <select name="name" id="inputName" class="form-control input-sm m-bot15">
                                    <option value="màu sắc">màu sắc</option>
                                    <option value="DUNG TÍCH NỒI">DUNG TÍCH NỒI</option>
                                    <option value="Nhà sản xuất">Nhà sản xuất</option>

                                </select>
                            </div>
                            <div class="form-group value1">
                                <label>Gía trị</label>
                                <input type="color" class="form-control" name="value" id="v1" placeholder="Nhập giá trị">
                            </div>

                            <div class="form-group value2" style="display: none">
                                <label>Gía trị</label>
                                <input type="text" class="form-control" name="" id="v2" placeholder="Nhập giá trị DUNG TÍCH NỒI ( Dưới 5 lít, 5 lít - Dưới 7 lít...)">
                            </div>

                            <div class="form-group value3" style="display: none">
                                <label>Gía trị</label>
                                <input type="text " class="form-control" name="" id="v3" placeholder="Nhập giá trị nhà sản xuất">
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm Mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/admin/attributes/add.blade.php ENDPATH**/ ?>