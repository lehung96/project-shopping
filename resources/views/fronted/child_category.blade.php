<!--kiểm tra $categoryParent vì mỗi lần lặp sẽ lấy được parent_id =0  -->
<!--tiếp theo trỏ đến categoryChildrent phương thức chung gian lấy ra tất cả danh mục con -->
<!--và gọi đến phương count đếm xem  có danh mục con hay ko nếu có danh mục con mình mới show ul-->
<!-- và sâu ul phải có li vì vậy phải lặp lại li -->
@if($categoryParent->categoryChildrent->count())
                    <ul class="cat-mega-menu">
                        <!-- Từ danh mục cha muốn lấy ra danh mục con thì mình định nghĩa ra phương thức trung gian-->
                       <!--là categoryChildrent() bên Model để lấy ra tất cả danh mục con -->
                        @foreach($categoryParent->categoryChildrent as $categoryChild)
                        <li class="right-menu cat-mega-title">
                            <a href="{{route('category.allproduct', ['slug' => $categoryChild->slug, 'allpro_id' => $categoryChild->category_id])}}">
                                {{ $categoryChild->name }}</a>
                            {{--sau khi in ra thẻ a tiếp tục lặp  bằng việc dùng câu lệnh if để kiểm tra--}}
                            <!-- nghĩa là nếu có danh mục con  -->
                            <!-- nếu check li có danh mục con tiếp tục chạy và sẽ include ul và li vào   -->

                            @if($categoryChild->categoryChildrent->count())

                                <ul>
                                @foreach($categoryChild->categoryChildrent as $categoryChi)
                                    <!--include('fronted.child_menu', ['categoryParent' => $categoryChild]) truyền vào 1 mảng   -->
                                    <!-- truyền vào 1 mảng dưới dạng key value  -->
                                    @include('fronted.child_category', ['categoryParent' => $categoryChild])
                                    <li>
                                        <a href="{{route('category.allproduct', ['slug' => $categoryChi->slug, 'allpro_id' => $categoryChi->category_id])}}">
                                            {{ $categoryChi->name }}
                                        </a>
                                    </li>

                                    @endforeach
                                </ul>

                            @endif

                        </li>
                        @endforeach
                    </ul>
@endif
