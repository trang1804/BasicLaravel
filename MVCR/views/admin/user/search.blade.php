@extends('admin.index')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="col-lg-2">
                <h1 class="page-header">Search</h1>
            </div>
            <div class="col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: :#337AB7; color:white;">
                        <h4><b>Tìm kiếm : {{$key}}</b></h4>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $value)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->username}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>{{$value->role}}
                                        {{-- @if($value->role==1)
                                        {{"Admin"}}
                                        @else
                                        {{"User"}}
                                        @endif --}}
                                    </td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/user/edit/{{$value->id}}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection