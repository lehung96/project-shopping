<!--Category Menu Start-->
<div class="category-menu category-menu-2">
    <div class="category-heading">
        <h2 class="categories-toggle"><span>Danh Mục</span></h2>
    </div>
    <div id="cate-toggle" class="category-menu-list">
        <ul>
            <!--vòng lặp đầu tiên mình lấy ra được danh mục gốc -->
            @foreach( $categorysLimit as $categoryParent)
                <li class="right-menu">
                    <a href="{{route('category.allproduct', ['slug' => $categoryParent->slug, 'allpro_id' => $categoryParent->category_id])}}">
                        {{ $categoryParent->name }}</a>
                    <!--kiểm tra $categoryParent vì mỗi lần lặp sẽ lấy được parent_id =0  -->
                    <!--tiếp theo trỏ đến categoryChildrent phương thức chung gian lấy ra tất cả danh mục con -->
                    <!--và gọi đến phương count đếm xem  có danh mục con hay ko nếu có danh mục con mình mới show ul-->
                    <!-- và sâu ul phải có li vì vậy phải lặp lại li -->
{{--                    @if($categoryParent->categoryChildrent->count())--}}
{{--                    <ul class="cat-mega-menu">--}}
{{--                        @foreach($categoryParent->categoryChildrent as $categoryChild)--}}
{{--                        <li class="right-menu cat-mega-title">--}}
{{--                            <a href="shop-left-sidebar.html">{{ $categoryChild->name }}</a>--}}
{{--                            <ul>--}}

{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
                        {{--('fronted.child_menu', ['categoryParent' => $categoryParent]) chuyền tên biến categoryParent từ child lấy dữ liệu động--}}
                        {{--bằng giá trị mang đến là => $categoryParent bên child_category.blade.php {{ $categoryChild->name }} là $categoryChild --}}
                        @include('fronted.child_category', ['categoryParent' => $categoryParent])
{{--                    @endif--}}
                </li>
            @endforeach


{{--            <li><a href="#">Cameras</a></li>--}}
{{--            <li><a href="#">Headphone</a></li>--}}
{{--            <li><a href="#">Smartwatch</a></li>--}}
{{--            <li><a href="#">Out Door Room</a></li>--}}
{{--            <li><a href="#">Chamcham</a></li>--}}
{{--            <li class="rx-child"><a href="#">Mobile & Tablets</a></li>--}}
{{--            <li class="rx-child"><a href="#">Accessories</a></li>--}}
{{--            <li class="rx-parent">--}}
{{--                <a class="rx-default">More Categories</a>--}}
{{--                <a class="rx-show">Less Categories</a>--}}
{{--            </li>--}}
        </ul>
    </div>
</div>
<!--Category Menu End-->
