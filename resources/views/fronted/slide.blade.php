<div class="slider-area slider-area-3 pt-sm-30 pt-xs-30 pb-xs-30">
    <div class="slider-active owl-carousel">
        <!-- Begin Single Slide Area -->
        @foreach($sliders as $slide)
            <div class="single-slide align-center-left animation-style-01" style="
                background-image:  url({{asset('public/uploads/slider/'. $slide->image_name)}});
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
                min-height: 452px;
                width: 100%;">
                <div class="slider-progress"></div>
                <div class="slider-content">
                    <h5>{{$slide->description}} <span>{{$slide->discount}} VNĐ</span> {{$slide->content_time}}</h5>
                    <h2>{{$slide->name}}</h2>
                    <h3>Tổng quà đến  <span>{{ number_format((float)$slide->price) }} triệu</span></h3>
                    <div class="default-btn slide-btn">
                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
