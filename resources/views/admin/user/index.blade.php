@extends('admin.layouts.app')
@section("page-name","User Management")

@section('main')
<div class="content container-fluid">
					
	@include('page-header')

    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-info btn-sm" href="#user_modal" data-toggle="modal">Add New User</a><br><br>
            
            @if (Session::has("success"))

                <p class="alert alert-success">{{ Session::get("success") }} <button class="close" data-dismiss="alert">&times;</button> </p>
                
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 style="display:inline;margin-right:50px" class="card-title">Users Data</h4>
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
                                    <th>Email</th>
                                    <th>Cell</th>
                                    <th>Role</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($all_data as $data)
                                <tr>
                                    <td>{{ $loop -> index +1 }}</td>
                                    <td>{{ $data -> name }}</td>
                                    <td>{{ $data -> email }}</td>
                                    <td>{{ $data -> cell }}</td>
                                    <td>Admin</td>
                                    <td>{{ $data -> address }}</td>
                                    <td>{{ $data -> gender }}</td>
                                    <td>
                                        <div class="status-toggle">
                                            <input type="checkbox" id="status_1" class="check" checked="">
                                            <label for="status_1" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($data -> photo == NULL && $data -> gender == NULL)
                                        <img style="width:40px;height:40px" src="admin/assets/img/avatar-3.png" alt=""></td>
                                        @elseif($data -> photo == NULL && $data -> gender == "Male")
                                        <img style="width:40px;height:40px" src="admin/assets/img/avatar-1.png" alt=""></td>
                                        @elseif($data -> photo == NULL && $data -> gender == "Female")
                                        <img style="width:40px;height:40px" src="admin/assets/img/avatar-2.png" alt=""></td>
                                        @elseif($data -> photo != NULL)
                                        <img style="width:40px;height:40px" src="{{ url("") }}/media/users/{{ $data -> photo }}" alt="">
                                        @endif
                                        
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
<div class="modal fade" id="user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ route("user.store") }}" method="POST">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group">
                  <label for="">Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <select name="role" class="form-control" id="">
                    <option value="">-Select-</option>
                    <option value="">Admin</option>
                    <option value="">Editor</option>
                    <option value="">Author</option>
                    <option value="">Contributor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input name="pass" type="text" value="{{ $rand_pass }}" class="form-control" placeholder="password">
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














