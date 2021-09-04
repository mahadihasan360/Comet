@extends('admin.layouts.app')
@section("page-name","Post Tag");

@section('main')
<div class="content container-fluid">
					
	@include('page-header')

    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-info btn-sm" href="#tag_modal" data-toggle="modal">Add New Tag</a><br><br>

            @include('validate')

            <div class="card">
                <div class="card-header">
                    <h4 style="display:inline;margin-right:50px" class="card-title">Tag Data</h4>
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
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($all_data as $data)
                                <tr>
                                    <td>{{ $loop -> index +1 }}</td>
                                    <td>{{ $data -> name }}</td>
                                    <td>{{ $data -> slug }}</td>
                                    <td>
                                        <div>
                                            @if ($data -> status == true)
                                                <a class="badge badge-info" href="#">Published</a>
                                            @else
                                            <a class="badge badge-primary" href="#">Unpublished</a>
                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        @if ($data -> status == true)
                                        <a class="btn btn-info btn-sm" href="{{ route("tag.status",$data -> id) }}"><i class="fas fa-eye"></i></a>
                                        @else
                                        <a class="btn btn-info btn-sm" href="{{ route("tag.status",$data -> id) }}"><i class="fas fa-eye-slash"></i></a>
                                        @endif
                                        <a class="btn btn-warning btn-sm" href=""><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-danger btn-sm" href=""><i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                                @empty
                                <td class="text-center text-danger" style="width: 100%">No Results Found</td>
                                @endforelse
            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
</div>



<!-- Modal -->
<div class="modal fade" id="tag_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <form action="{{ route("tag.store") }}" method="POST">
            @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Tag</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="form-group">
                  <label for="">Tag Name</label>
                  <input name="name" type="text" class="form-control" placeholder="Tag Name">
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














