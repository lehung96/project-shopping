
<!DOCTYPE html>
<html lang="en">

@include('fronted.head')
<body>

<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
@include('fronted.header')
    <style>
        .ellipsis {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
        .block-ellipsis {
            display: -webkit-box;
            max-width: 100%;
            height: 90px;
            margin: 0 auto;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="active">{{$meta_title}} </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->

    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Li's Main Blog Page Area -->
    <div class="li-main-blog-page pt-60 pb-55">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Main Content Area -->
                <div class="col-lg-12">
                    <div class="row li-main-content">
                        @foreach($post_cate as $key => $p)
                            <div class="col-lg-4 col-md-6">
                                <div class="li-blog-single-item pb-25">
                                    <div class="li-blog-banner">
                                        <a href=""><img  style="width:80%;height: 200px"class="img-full" src="{{asset('public/uploads/post/'.$p->post_image)}}" alt=""></a>
                                    </div>
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h3 class="li-blog-heading pt-25"><a href="{{url('/bai-viet/'.$p->post_slug)}}" class="block-ellipsis">{{$p->post_title}}</a></h3>
                                            <div class="li-blog-meta">
{{--                                                <a class="author" href="#"><i class="fa fa-user"></i>{{isset($article->User->name)?$article->User->name:'Admin'}}</a>--}}
                                                <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$p->created_at}}</a>
                                            </div>
                                            <p>{!!$p->post_desc!!}</p>
                                            <a class="read-more" href="{{url('/bai-viet/'.$p->post_slug)}}">Xem thêm...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                    <!-- Begin Li's Pagination Area -->
                        <div class="col-lg-12">
                            <div class="li-paginatoin-area text-center pt-25">
                                <div class="row">
                                    <div class="col-2 mx-auto">
                                        {!!$post_cate->links()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Li's Pagination End Here Area -->
                    </div>
                </div>
                <!-- Li's Main Content Area End Here -->
            </div>
        </div>
    </div>
    <!-- Li's Main Blog Page Area End Here -->



{{--<!-- Begin Li's Breadcrumb Area -->--}}
{{--    <div class="breadcrumb-area">--}}
{{--        <div class="container">--}}
{{--            <div class="breadcrumb-content">--}}
{{--                <ul>--}}
{{--                    <li><a href="{{route('home')}}">Trang chủ</a></li>--}}
{{--                    <li class="active">{{$meta_title}} </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- Li's Breadcrumb Area End Here -->--}}

{{--<!-- Begin Li's Main Content Area -->--}}
{{--    <div class="col-lg-9 order-lg-2 order-1">--}}
{{--        <div class="row li-main-content">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="li-blog-single-item mb-30">--}}

{{--                    <div class="row">--}}
{{--                        @foreach($post_cate as $key => $p)--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="li-blog-banner">--}}
{{--                                <a href="blog-details-left-sidebar.html"><img  style="padding: 10px;" class="img-full" src="{{asset('public/uploads/post/'.$p->post_image)}}" alt=""></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-6">--}}
{{--                            <div class="li-blog-content">--}}
{{--                                <div class="li-blog-details">--}}
{{--                                    <h3 class="li-blog-heading pt-xs-25 pt-sm-25"><a href="blog-details-left-sidebar.html">{{$p->post_title}}</a></h3>--}}
{{--                                    <div class="li-blog-meta">--}}
{{--                                        <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>--}}
{{--                                        <a class="comment" href="#"><i class="fa fa-comment-o"></i></a>--}}
{{--                                        <a class="post-time" href="#"><i class="fa fa-calendar"></i> 26/7/20201</a>--}}
{{--                                    </div>--}}
{{--                                    <p>{!!$p->post_desc!!}</p>--}}
{{--                                    <a class="read-more" href="{{url('/bai-viet/'.$p->post_slug)}}">Xem bài viết</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                    <ul class="pagination pagination-sm m-t-none m-b-none">--}}

{{--                        {!!$post_cate->links()!!}--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Li's Pagination End Here Area -->--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- Li's Main Content Area End Here -->
@include('fronted.footer')
<!-- Footer Shipping Area End Here -->
</div>
@include('fronted.script')
</body>

</html>




