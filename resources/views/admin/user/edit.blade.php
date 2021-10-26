@extends('backend.layout')
@section('main_content')
    <div class="content-wrapper">
{{--        @include('partials.content-header', ['name' => 'User', 'key' => 'Edit'])--}}
        <h1>User Edit</h1>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhập tên"
                                       value="{{ $user->name }}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"
                                       class="form-control"
                                       name="email"
                                       placeholder="Nhập email"
                                       value="{{ $user->email }}"
                                >
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                       class="form-control"
                                       name="password"
                                       placeholder="Nhập password"

                                >
                            </div>
                            <div class="form-group">
                                <label>Chọn vai trò</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>

                                    @foreach($roles as $role)
                                        <option
                                            {{ $rolesOfUser->contains('id', $role->id) ? 'selected' : '' }}
                                            value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection















