@extends('backend.layout')
@section('main_content')

    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'Slider', 'key' => 'Thêm'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('slider.create') }}" class="btn btn-success float-right m-2"> Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">giảm giá</th>
                                <th scope="col">giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">nội dung & thời gian</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $sliders as $slider)

                                <tr>
                                    <th scope="row">{{ $slider->id }}</th>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>{{ number_format((float)$slider->discount)}} VNĐ</td>
                                    <td>{{ number_format((float)$slider->price)}} VNĐ</td>
                                    <td>
                                        <img class="product_image_180_280" src="{{asset('public/uploads/slider/'. $slider->image_name)}}" alt="">
                                    </td>
                                    <td>{{ $slider->content_time }}</td>

                                    <td>
                                        <a href="{{ route('slider.edit',['id'=>$slider->id]) }}"
                                           class="btn btn-default">Sửa</a>
                                        <a href="{{ route('slider.delete',['id'=>$slider->id]) }}"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{  $sliders->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

