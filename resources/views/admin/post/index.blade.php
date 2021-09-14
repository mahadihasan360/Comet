@extends('admin.layouts.app')
@section("page-name","All Posts");

@section('main')
<div class="content container-fluid">
					
	@include('page-header')

    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-info btn-sm" href="{{ route("post.create") }}">Add New Post</a><br><br>

            @include('validate')

            <div class="card">
                <div class="card-header">
                    <h4 style="display:inline;margin-right:50px" class="card-title">Post Data</h4>
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
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                @forelse ($all_data as $data)
                                <tr>
                                    <td>{{ $loop -> index +1 }}</td>
                                    <td>{{ Str::of($data -> title) -> limit(20) }}</td>
                                    <td>
                                        @php
                                            $featured = json_decode($data -> featured);
                                            echo $featured -> post_type;
                                        @endphp
                                    </td>
                                    <td>{{ $data -> created_at -> diffForHumans() }}</td>
                                    {{-- <td>{{ date("M - d - Y", Strtotime($data -> created_at)) }}</td> --}}
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
                                        <a class="btn btn-info btn-sm" href="{{ route("cat.status",$data -> id) }}"><i class="fas fa-eye"></i></a>
                                        @else
                                        <a class="btn btn-info btn-sm" href="{{ route("cat.status",$data -> id) }}"><i class="fas fa-eye-slash"></i></a>
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


@endsection














