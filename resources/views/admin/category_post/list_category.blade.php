@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Danh Sách  ', 'key' => 'Danh mục bài viết'])
        <div class="table-agile-info">
            <div class="panel panel-default">

                <div class="table-responsive">
                    <?php
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="text-alert">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>

                    <div class="col-md-12">
                        {{--đưa link vào trong href có phương thức là route và truyền tên name của route vào--}}
                        <a href="{{URL::to('/add-category-post')}}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th>Tên danh mục bài viết</th>
                            <th>Mô tả danh mục</th>
                            <th>Slug</th>
                            <th>Action</th>


                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category_post as $key => $cate_post)
                            <tr>
                                <th scope="row">{{$cate_post->cate_post_id}}</th>
                                <td>{{ $cate_post->cate_post_name }}</td>
                                <td>{{ $cate_post->cate_post_desc }}</td>
                                <td>{{ $cate_post->cate_post_slug }}</td>
{{--                                <td>--}}
{{--                                    @if($cate_post->cate_post_status==0)--}}
{{--                                        Hiển thị--}}
{{--                                    @else--}}
{{--                                        Ẩn--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                                <td>

                                    <a href="{{URL::to('/edit-category-post/'.$cate_post->cate_post_id)}}"
                                       class="btn btn-default">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')"
                                       href="{{URL::to('/delete-category-post/'.$cate_post->cate_post_id)}}"
                                       data-url=""
                                       class="btn btn-danger ">Xóa
                                    </a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">


                        <div class="col-sm-7 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                {!!$category_post->links()!!}
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
@endsection
