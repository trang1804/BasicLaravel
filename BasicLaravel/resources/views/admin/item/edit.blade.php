@extends('admin.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Item
                        <small>{{$item->item_name}}</small>
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
                    <form action="admin/item/edit/{{$item->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="form-group">
                            <label>User</label>
                            <select name="user" class="form-group">
                                @foreach($user as $value)
                                    <option 
                                    @if($item->user_id==$value->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$value->id}}">{{$value->username}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-group">
                                @foreach($category as $value)
                                    <option 
                                    @if($item->category_id==$value->id)
                                        {{"selected"}}
                                    @endif
                                    value="{{$value->id}}">{{$value->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="txtName" placeholder="Please Enter Item name" value="{{$item->item_name}}"/>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" name="txtPrice" placeholder="Please Enter Price" value="{{$item->price}}"/>
                        </div>
                        <button type="submit" class="btn btn-default">Item Edit</button>
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