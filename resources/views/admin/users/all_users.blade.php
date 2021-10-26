@extends('backend.layout')
@section('main_content')

    <div class="content-wrapper">
            @include('backend.content-header', ['name' => 'Danh sách', 'key' => 'Vai trò user'])
        <div class="content">
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span style="color: red; font-size: 20px"  class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="margin-top:5px">
{{--                        <a href="" class="btn btn-success float-right m-2"> Add</a>--}}
                    </div>
                    <div class="col-md-12">
                        <table class="table table-striped b-t b-light">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th>Tên user</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Password</th>
                                <th>admin</th>
                                <th>user</th>
                                <th>developer</th>
                                <th>content</th>

                                <th style="width:30px;"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($admin as $key => $user)
                                {{--url('/assign-roles')--}}
                                <form action="{{url('/assign-roles')}}" method="POST">
                                    @csrf
                                    <tr>

                                        <th scope="row">{{$user->admin_id}}</th>
                                        <td>{{ $user->admin_name }}</td>
                                        <td>
                                            {{ $user->admin_email }}{{--câu lệnh này có nghĩa là cấp quyền lại mang admin_email
                                             để gửi qua hàm assign-roles url('/assign-roles')(có nghĩa là phân quyền làm mới quyền lại  --}}
                                            <input type="hidden" name="admin_email" value="{{ $user->admin_email }}">
                                            <input type="hidden" name="admin_id" value="{{ $user->admin_id }}">
                                        </td>
                                        <td>{{ $user->admin_phone }}</td>
                                        <td>{{ $user->admin_password }}</td>
                                        {{--<input type="checkbox" name="admin_role" là ô checkbox
                                        thì checked khi $user ->hasRole là có vai trò(admin)Quản trị hệ thống thì checked
                                                            name="admin_role" dùng để sang bên hàm public function assign_roles()               --}}
                                        <td><input type="checkbox" name="admin_role" {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                                        <td><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>
                                        <td><input type="checkbox" name="dev_role"  {{$user->hasRole('dev') ? 'checked' : ''}}></td>
                                        <td><input type="checkbox" name="content_role"  {{$user->hasRole('content') ? 'checked' : ''}}></td>

                                        <td>


                                            <p><input type="submit" value="Phân quyền" class="btn btn-sm btn-default"></p>
                                            <p><a style="margin:5px 0;" class="btn btn-sm btn-danger" href="{{url('/delete-user-roles/'.$user->admin_id)}}">Xóa user</a></p>
                                            <p><a style="margin:5px 0;" class="btn btn-sm btn-success" href="{{url('/impersonate/'.$user->admin_id)}}">Chuyển quyền</a></p>

                                        </td>

                                    </tr>
                                </form>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {!!$admin->links()!!}
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
