@extends('admin.layouts.app')

@section('main')
<div class="content container-fluid">
					
	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Welcome Admin!</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item active">Dashboard</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-info btn-sm" href="{{ route("staff.create") }}">Add New Staff</a><br><br>
            
            @if (Session::has("success"))

                <p class="alert alert-success">{{ Session::get("success") }} <button class="close" data-dismiss="alert">&times;</button> </p>
                
            @endif

            <div class="card">
                <div class="card-header">
                    <h4 style="display:inline;margin-right:50px" class="card-title">Staff Data - Trash</h4>
                    <a style="margin-right:10px" class="badge badge-primary" href="{{ route("staff.index") }}">Published</a>
                    <a class="badge badge-warning" href="{{ route("staff.trash.all") }}">Trash</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($all_data as $data)
                                <tr>
                                    <td>{{ $loop -> index +1 }}</td>
                                    <td>{{ $data -> name }}</td>
                                    <td>{{ $data -> email }}</td>

                                    <td>
                                        <a class="btn btn-info" href="{{ route("staff.trash",$data -> id) }}">Restore</a>

                                        <form class="d-inline" action="{{ route("staff.destroy",$data -> id) }}" method="POST">
											@csrf
											@method("DELETE")

											<button class="btn btn-danger">Delete Permenantly</button>
											
										</form>

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
@endsection














