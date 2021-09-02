@extends('admin.layouts.app')
@section("page-name","User Role");

@section('main')
<div class="content container-fluid">
					
	<!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome User Role</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">User Role</li>
                        </ul>
                    </div>
                </div>
            </div>
<!-- /Page Header -->

    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-info btn-sm" href="#role_modal" data-toggle="modal">Add New Role</a><br><br>

            @include('validate')

            <div class="card">
                <div class="card-header">
                    <h4 style="display:inline;margin-right:50px" class="card-title">Role Data</h4>
                    <a style="margin-right:10px" class="badge badge-primary" href="">Published</a>
                    <a class="badge badge-warning" href="">Trash</a>
                    <form style="float: right;" action="" method="POST" class="form-inline">
                        @csrf
                        <div class="form-group">
                            <input name="search" style="margin-right: 5px" class="form-control" type="text" placeholder="Search">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Search">
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Permissions</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($all_data as $data)
                                <tr>
                                    <td>{{ $loop -> index +1 }}</td>
                                    <td>{{ $data -> name }}</td>
                                    <td>{{ $data -> slug }}</td>
                                    <td>

                                        @if ($data -> permission !== NULL)
                                            <ul style="list-style: none">
                                                @foreach (json_decode($data -> permission) as $per)
                                                   <li> <i class="fa fa-check"></i> &nbsp;{{ $per }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        

                                    </td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_1" class="check" checked="">
                                            <label for="status_1" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>

                                    <td>
                                        <a class="btn btn-info btn-sm" href=""><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-warning btn-sm" href=""><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-sm" href=""><i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</div>



<!-- Modal -->
<div class="modal fade" id="role_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ route("role.store") }}" method="POST">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Role</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group">
                  <label for="">Role Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="">Permissions</label><hr>
                <input type="checkbox" name="permission[]" id="Admin" value="Admin"> <label for="Admin">Admin</label><br>
                <input type="checkbox" name="permission[]" id="Editor" value="Editor"> <label for="Editor">Editor</label><br>
                <input type="checkbox" name="permission[]" id="Author" value="Author"> <label for="Author">Author</label><br>
                <input type="checkbox" name="permission[]" id="Staff" value="Staff"> <label for="Staff">Staff</label><br>
                <input type="checkbox" name="permission[]" id="Teacher" value="Teacher"> <label for="Teacher">Teacher</label><br>
                <input type="checkbox" name="permission[]" id="Student" value="Student"> <label for="Student">Student</label><br>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>
    </div>
  </div>


@endsection














