@extends('backend.layout')
@section('main_content')

    <div class="content-wrapper">
        @include('backend.content-header', ['name' => 'ảnh sản phẩm', 'key' => 'Thêm'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('sellslider.create') }}" class="btn btn-success float-right m-2"> Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên ảnh bán</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Product_id</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach( $s_sliders as $sell_slider)

                                <tr>
                                    <th scope="row">{{ $sell_slider->id }}</th>
                                    <td>{{ $sell_slider->name }}</td>
                                    <td>
                                        <img class="product_image_180_280" src="{{asset('public/uploads/sellslide/'. $sell_slider->image)}}" alt="">
                                    </td>
                                    <td>{{ $sell_slider->product_id }}</td>

                                    <td>
                                        <a href="{{ route('sellslider.edit',['id'=>$s_sliders->id]) }}"
                                           class="btn btn-default">Sửa</a>
                                        <a href="{{ route('sellslider.delete',['id'=>$s_sliders->id]) }}"
                                           data-url=""
                                           class="btn btn-danger ">Xóa</a>

                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{  $s_sliders->links() }}
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

