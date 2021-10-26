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
                        <a href="{{URL::to('/add-post')}}" class="btn btn-success float-right m-2">Thêm</a>
                    </div>
                    <table class="table table-striped b-t b-light" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th>Tên bài viết</th>
                            <th>Hình ảnh</th>
                            <th>Slug</th>
                            <th>Mô tả bài viết</th>
                            <th>Từ khóa bài viết</th>
                            <th>Danh mục bài viết</th>
                            <th>Hiển thị</th>

                            <th style="width:30px;"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_post as $key => $post)
                            <tr>
                                <th scope="row">{{$post->post_id}}</th>
                                <td>{{ $post->post_title }}</td>
                                <td><img src="{{asset('public/uploads/post/'.$post->post_image)}}" height="100"
                                         width="100"></td>
                                <td>{{ $post->post_slug }}</td>
                                <td>{!! $post->post_desc !!}</td>
                                <td>{{ $post->post_meta_keywords }}</td>
                                {{--            <td>{{ $post->cate_post->cate_post_name }}</td>--}}
                                <td>
                                    @if($post->post_status==0)
                                        Hiển thị
                                    @else
                                        Ẩn
                                    @endif
                                </td>

                                <td>

                                    <a href="{{URL::to('/edit-post/'.$post->post_id)}}"
                                       class="btn btn-default">Sửa</a>
                                    <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')"
                                       href="{{URL::to('/delete-post/'.$post->post_id)}}"
                                       data-url=""
                                       class="btn btn-danger ">Xóa
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
