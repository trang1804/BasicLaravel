@extends('admin.index')

@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Item
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <form action="admin/item/search" method="POST" class="navbar-form navbar-left" role="search">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <input type="text" name="key" class="form-control" placeholder="Tìm kiếm">
                    </div>
                </form>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($item as $value)
                            <tr class="odd gradeX" align="center">
                                <td>{{$value->id}}</td>
                                <td>{{$value->item_name}}</td>
                                <td>{{$value->price}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/item/delete/{{$value->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/item/edit/{{$value->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
            {{$item->links()}}
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection

