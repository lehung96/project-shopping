{{--@extends('fronted.layout')--}}
{{--@section('main_content')--}}
{{--<style type="text/css">--}}
{{--  .baiviet ul li {--}}
{{--    padding: 2px;--}}
{{--    font-size: 16px;--}}
{{--}--}}
{{--.baiviet ul li a {--}}
{{--    color: #000;--}}
{{--}--}}
{{--.baiviet ul li a:hover {--}}
{{--    color: #FE980F;--}}
{{--}--}}
{{--.baiviet ul li {--}}
{{--    list-style-type: decimal-leading-zero;--}}
{{--}--}}
{{--.mucluc h1 {--}}
{{--    font-size: 20px;--}}
{{--    color: brown;--}}
{{--}--}}
{{--</style>--}}
{{--                      <div class="features_items">--}}

{{--                        <h2 style="margin:0;position: inherit;font-size: 22px" class="title text-center">{{$meta_title}}</h2>--}}


{{--                      	 	<div class="product-image-wrapper" style="border: none;">--}}
{{--                            @foreach($post_by_id as $key => $p)--}}
{{--                                <div class="single-products" style="margin:10px 0;padding: 2px">--}}
{{--                                     {!!$p->post_content!!}--}}

{{--                                </div>--}}
{{--                                <div class="clearfix"></div>--}}
{{--                           @endforeach--}}
{{--                            </div>--}}

{{--                    	</div><!--features_items-->--}}
{{--                      <h2 style="margin:0;font-size: 22px" class="title text-center">Bài viết liên quan</h2>--}}
{{--                      <style type="text/css">--}}
{{--                        ul.post_relate li {--}}
{{--                          list-style-type: disc;--}}
{{--                          font-size: 16px;--}}
{{--                          padding: 6px;--}}
{{--                        }--}}
{{--                        ul.post_relate li a {--}}
{{--                            color: #000;--}}
{{--                        }--}}
{{--                        ul.post_relate li a:hover {--}}
{{--                            color: #FE980F;--}}
{{--                        }--}}
{{--                      </style>--}}
{{--                      <ul class="post_relate">--}}
{{--                        @foreach($related as $key => $post_relate)--}}
{{--                          <li><a href="{{url('/bai-viet/'.$post_relate->post_slug)}}">{{$post_relate->post_title}}</a></li>--}}
{{--                        @endforeach--}}

{{--                      </ul>--}}

{{--        <!--/recommended_items-->--}}
{{--@endsection--}}


    <!DOCTYPE html>
<html lang="en">

@include('fronted.head')
<body>

<!-- Begin Body Wrapper -->
<div class="body-wrapper">
    <!-- Begin Header Area -->
@include('fronted.header')

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
    <!-- Begin Li's Blog Sidebar Area -->

    <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="row li-main-content">
                        <div class="col-lg-12">
                            <div class="li-blog-single-item pb-30">
                                <div class="li-blog-banner">
                                    <a href="blog-details.html"><img class="img-full"
                                                                     src="images/blog-banner/bg-banner.jpg" alt=""></a>
                                </div>
                                <div class="li-blog-content offset-3">
                                    <div class="li-blog-details">
                                        <h3 class="li-blog-heading pt-25"><a href="#">{{$meta_title}}</a></h3>
                                        <div class="li-blog-meta">
                                            <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>

                                            <a class="post-time" href="#"><i class="fa fa-calendar"></i> 26/7 2021</a>
                                        </div>
                                        @foreach($post_by_id as $key => $p)
                                            <div class="single-products " style="margin:10px 0;padding: 2px">
                                                {!!$p->post_content!!}

                                            </div>
                                            <div class="clearfix"></div>
                                        @endforeach
                                        <div class="li-blog-sharing text-center pt-30">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        {{--                <style>--}}
                        {{--                    .article_content img{--}}
                        {{--                        position: relative;--}}
                        {{--                        left: 50%;--}}
                        {{--                        transform: translateX(-50%);--}}
                        {{--                    }--}}
                        {{--                </style>--}}
                        {{--                <!-- Begin Li's Breadcrumb Area -->--}}
                        {{--                <div class="breadcrumb-area">--}}
                        {{--                    <div class="container">--}}
                        {{--                        <div class="breadcrumb-content">--}}
                        {{--                            <ul>--}}
                        {{--                                <li><a href="{{route('home')}}">Trang chủ</a></li>--}}
                        {{--                                <li class="active">{{$meta_title}} </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}
                        {{--                <!-- Li's Breadcrumb Area End Here -->--}}
                        {{--                <!-- Begin Li's Main Blog Page Area -->--}}
                        {{--                <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">--}}
                        {{--                    <div class="container">--}}
                        {{--                        <div class="row">--}}
                        {{--                            <!-- Begin Li's Blog Sidebar Area -->--}}
                        {{--                            <div class="col-lg-3 order-lg-2 order-2">--}}
                        {{--                                <h4><u><center>Các tin tức khác: </center></u></h4>--}}
                        {{--                                @foreach($post_by_id as $artic)--}}
                        {{--                                    <div style="margin-top: 20px"><a href="{{route('get.article.detail',$artic->id)}}">➤ <b>{{$artic->a_name}}</b></a></div>--}}
                        {{--                                @endforeach--}}
                        {{--                            </div>--}}
                        {{--                            <!-- Li's Blog Sidebar Area End Here -->--}}
                        {{--                            <!-- Begin Li's Main Content Area -->--}}
                        {{--                            <div class="col-lg-9 order-lg-1 order-1">--}}
                        {{--                                <div class="row li-main-content">--}}
                        {{--                                    <div class="col-lg-12">--}}
                        {{--                                        <div class="li-blog-single-item pb-30">--}}
                        {{--                                            <div class="li-blog-banner">--}}
                        {{--                                                <a href="blog-details.html"><img class="img-full" src="{{asset('upload/a_image/'.$article->a_image)}}" alt=""></a>--}}
                        {{--                                            </div>--}}
                        {{--                                            <div class="li-blog-content">--}}
                        {{--                                                <div class="li-blog-details">--}}
                        {{--                                                    <h3 class="li-blog-heading pt-25"><a href="#">{{$article->a_name}}</a></h3>--}}
                        {{--                                                    <div class="li-blog-meta">--}}
                        {{--                                                        <a class="author" href="#"><i class="fa fa-user"></i>{{isset($article->User->name)?$article->User->name:'Admin'}}</a>--}}
                        {{--                                                        <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{$article->created_at}}</a>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <!-- Begin Blog Blockquote Area -->--}}
                        {{--                                                    <div class="li-blog-blockquote">--}}
                        {{--                                                        <blockquote>--}}
                        {{--                                                            <p>{{$article->a_description}}</p>--}}
                        {{--                                                        </blockquote>--}}
                        {{--                                                    </div>--}}
                        {{--                                                    <!-- Blog Blockquote Area End Here -->--}}
                        {{--                                                    <div class="article_content"><p>{!!$article->a_content!!}</p></div>--}}
                        {{--                                                </div>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                            <!-- Li's Main Content Area End Here -->--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}
                        {{--                <!-- Li's Main Blog Page Area End Here -->--}}
                        {{--            @endsection--}}
                        <!-- Blog comment Box Area End Here -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-2 order-2">
                    <h4><u>
                            <center>Các tin tức khác:</center>
                        </u></h4>
                    @foreach($related as $key => $post_relate)
                        <div style="margin-top: 20px"><a href="{{url('/bai-viet/'.$post_relate->post_slug)}}">➤
                                <b>{{$post_relate->post_title}}</b></a></div>
                    @endforeach
                </div>
                <!-- Begin Li's Main Content Area -->

            </div>
        </div>
    </div>
                <!-- Li's Main Content Area End Here -->
            @include('fronted.footer')
            <!-- Footer Shipping Area End Here -->
            </div>
@include('fronted.script')
</body>

</html>





