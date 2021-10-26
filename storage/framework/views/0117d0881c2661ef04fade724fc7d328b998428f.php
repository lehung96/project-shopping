<!--kiểm tra $categoryParent vì mỗi lần lặp sẽ lấy được parent_id =0  -->
<!--tiếp theo trỏ đến categoryChildrent phương thức chung gian lấy ra tất cả danh mục con -->
<!--và gọi đến phương count đếm xem  có danh mục con hay ko nếu có danh mục con mình mới show ul-->
<!-- và sâu ul phải có li vì vậy phải lặp lại li -->
<?php if($categoryParent->categoryChildrent->count()): ?>
                    <ul class="cat-mega-menu">
                        <!-- Từ danh mục cha muốn lấy ra danh mục con thì mình định nghĩa ra phương thức trung gian-->
                       <!--là categoryChildrent() bên Model để lấy ra tất cả danh mục con -->
                        <?php $__currentLoopData = $categoryParent->categoryChildrent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="right-menu cat-mega-title">
                            <a href="<?php echo e(route('category.allproduct', ['slug' => $categoryChild->slug, 'allpro_id' => $categoryChild->category_id])); ?>">
                                <?php echo e($categoryChild->name); ?></a>
                            
                            <!-- nghĩa là nếu có danh mục con  -->
                            <!-- nếu check li có danh mục con tiếp tục chạy và sẽ include ul và li vào   -->

                            <?php if($categoryChild->categoryChildrent->count()): ?>

                                <ul>
                                <?php $__currentLoopData = $categoryChild->categoryChildrent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryChi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <!--include('fronted.child_menu', ['categoryParent' => $categoryChild]) truyền vào 1 mảng   -->
                                    <!-- truyền vào 1 mảng dưới dạng key value  -->
                                    <?php echo $__env->make('fronted.child_category', ['categoryParent' => $categoryChild], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <li>
                                        <a href="<?php echo e(route('category.allproduct', ['slug' => $categoryChi->slug, 'allpro_id' => $categoryChi->category_id])); ?>">
                                            <?php echo e($categoryChi->name); ?>

                                        </a>
                                    </li>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>

                            <?php endif; ?>

                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/fronted/child_category.blade.php ENDPATH**/ ?>