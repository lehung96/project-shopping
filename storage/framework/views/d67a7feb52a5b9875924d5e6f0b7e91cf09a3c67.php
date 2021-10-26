<!--Category Menu Start-->
<div class="category-menu category-menu-2">
    <div class="category-heading">
        <h2 class="categories-toggle"><span>Danh Mục</span></h2>
    </div>
    <div id="cate-toggle" class="category-menu-list">
        <ul>
            <!--vòng lặp đầu tiên mình lấy ra được danh mục gốc -->
            <?php $__currentLoopData = $categorysLimit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryParent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="right-menu">
                    <a href="<?php echo e(route('category.allproduct', ['slug' => $categoryParent->slug, 'allpro_id' => $categoryParent->category_id])); ?>">
                        <?php echo e($categoryParent->name); ?></a>
                    <!--kiểm tra $categoryParent vì mỗi lần lặp sẽ lấy được parent_id =0  -->
                    <!--tiếp theo trỏ đến categoryChildrent phương thức chung gian lấy ra tất cả danh mục con -->
                    <!--và gọi đến phương count đếm xem  có danh mục con hay ko nếu có danh mục con mình mới show ul-->
                    <!-- và sâu ul phải có li vì vậy phải lặp lại li -->











                        
                        
                        <?php echo $__env->make('fronted.child_category', ['categoryParent' => $categoryParent], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>













        </ul>
    </div>
</div>
<!--Category Menu End-->
<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/fronted/menu.blade.php ENDPATH**/ ?>