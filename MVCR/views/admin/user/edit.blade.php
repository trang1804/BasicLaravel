@extends('admin.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>{{$user->username}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif
                    <form action="admin/user/edit/{{$user->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="txtUser" placeholder="Please Enter Username" value="{{$user->username}}"/>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="txtPass" placeholder="Please Enter Password" value="{{$user->password}}" />
                        </div>
                        <div class="form-group">
                            <label>RePassword</label>
                            <input type="password" class="form-control" name="txtRePass" placeholder="Please Enter RePassword" value="{{$user->password}}" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="txtEmail" placeholder="Please Enter Email" value="{{$user->email}}"/>
                        </div>
                        <div class="form-group">
                            <label>Role User</label>
                            <label class="radio-inline">
                                <input name="role" value="1"
                                @if($user->role==1)
                                {{"checked"}}
                                @endif
                                type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="role" value="2"
                                @if($user->role==2)
                                {{"checked"}}
                                @endif
                                type="radio">User
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">User Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection