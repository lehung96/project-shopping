<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(URL::to('/dashboard')); ?>" class="brand-link">
        <img src="<?php echo e(asset('public/adminlte/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->









        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo e(URL::to('/dashboard')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Thống Kê
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('categories.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Danh mục sản phẩm

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('products.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                           Sản phẩm
                            
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(route('attributes.index')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Quản lý Thuộc tính
                            
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Đơn Hàng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(URL::to('/manage-order')); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý đơn hàng</p>
                            </a>
                        </li>

                    </ul>
                </li>




























                <li class="nav-item">
                    <a href="<?php echo e(URL::to('/all-category-post')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Danh mục bài viết
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo e(URL::to('/all-post')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-edit "></i>
                        <p>
                            Bài viết
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="<?php echo e(URL::to('/comment')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Liệt kê bình luận
                        </p>
                    </a>
                </li>









                <?php if (\Illuminate\Support\Facades\Blade::check('impersonate')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(URL::to('/impersonate-destroy')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Stop chuyển quyền
                        </p>
                    </a>
                </li>
                <?php endif; ?>

     
                <?php if (\Illuminate\Support\Facades\Blade::check('hasrole', ['admin','dev'])): ?>
                
                <li class="nav-item">
                    <a href="<?php echo e(URL::to('/users')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                             Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(URL::to('/add-users')); ?>" class="nav-link">
                                <i class="far fa-address-book-o nav-icon"></i>
                                <p>Thêm User</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(URL::to('/users')); ?>" class="nav-link">
                                <i class="far fa-address-book-o nav-icon"></i>
                                <p>Liệt kê User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php endif; ?>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pages tĩnh
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('slider.index')); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('Sells-Slides.index')); ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sells Slides</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/backend/menu.blade.php ENDPATH**/ ?>