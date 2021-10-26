<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/dashboard')}}" class="brand-link">
        <img src="{{asset('public/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
{{--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">--}}
{{--            <div class="image">--}}
{{--                <img src="{{asset('public/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
{{--            </div>--}}
{{--            <div class="info">--}}
{{--                <a href="#" class="d-block">Alexander Pierce</a>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{URL::to('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Thống Kê
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('categories.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-list-alt"></i>
                        <p>
                            Danh mục sản phẩm
{{--                            <span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('products.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                           Sản phẩm
                            {{--                            <span class="right badge badge-danger">New</span>--}}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('attributes.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Quản lý Thuộc tính
                            {{--                            <span class="right badge badge-danger">New</span>--}}
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
                            <a href="{{URL::to('/manage-order')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản lý đơn hàng</p>
                            </a>
                        </li>

                    </ul>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-book"></i>--}}
{{--                        <p>--}}
{{--                            Quản lý Thuộc tính--}}
{{--                            <i class="fas fa-angle-left right"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="{{URL::to('/manage-attributes')}}" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Quản lý đơn hàng</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('menus.index')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-table"></i>--}}
{{--                        <p>--}}
{{--                            Menus--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}


                <li class="nav-item">
                    <a href="{{URL::to('/all-category-post')}}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Danh mục bài viết
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{URL::to('/all-post')}}" class="nav-link">
                        <i class="nav-icon fas fa-edit "></i>
                        <p>
                            Bài viết
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{URL::to('/comment')}}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Liệt kê bình luận
                        </p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('users.index') }}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-user"></i>--}}
{{--                        <p>--}}
{{--                            Danh sách nhân viên--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}

                @impersonate
                <li class="nav-item">
                    <a href="{{URL::to('/impersonate-destroy')}}" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Stop chuyển quyền
                        </p>
                    </a>
                </li>
                @endimpersonate

     {{--Tên hasrole đã khai báo bên hàm Blade của class BladeServiceProvider </li>
  @hasrole(['admin','author']) nghĩa là nếu tài khoản đăng nhập có quyền admin thì được vào user--}}
                @hasrole(['admin','dev']){{--ngoặc Vuông là nhiều cho và đấu ngoặc [] tạo thanh một chuỗi --}}
                {{--['admin','dev'] cậu lệnh này là truyền vào các quyền để
                 có quyền xem được danh sách user trong phần backend hiển thị--}}
                <li class="nav-item">
                    <a href="{{URL::to('/users')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                             Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL::to('/add-users')}}" class="nav-link">
                                <i class="far fa-address-book-o nav-icon"></i>
                                <p>Thêm User</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{URL::to('/users')}}" class="nav-link">
                                <i class="far fa-address-book-o nav-icon"></i>
                                <p>Liệt kê User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @endhasrole

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
                            <a href="{{route('slider.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Sells-Slides.index')}}" class="nav-link">
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
