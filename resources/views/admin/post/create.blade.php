@extends('admin.layouts.app')
@section("page-name","Blog Post Create");
@section('main')
<div class="content container-fluid">
					
	@include('page-header')

	<div class="row">
		<div class="col-xl-9 d-flex">
			<div class="card flex-fill">
				<div class="card-header">
					<h4 class="card-title">Add New Post</h4>
				</div>
				{{-- alert message --}}
				@if (Session::has("success"))

                <p class="alert alert-success">{{ Session::get("success") }} <button class="close" data-dismiss="alert">&times;</button> </p>
                
                @endif
				{{-- error message --}}
				@if ($errors -> any())
					<p class="alert alert-danger">{{ $errors -> first() }} <button class="close" data-dismiss="alert">&times;</button> </p>
				@endif


				<div class="card-body">
					<form action="{{ route("post.store") }}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label>Title</label>
							<input name="title" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Post Type</label>
							<select class="form-control" name="" id="post_type">
								<option value="">-Select-</option>
								<option value="Standard">Standard</option>
								<option value="Gallery">Gallery</option>
								<option value="Video">Video</option>
								<option value="Audio">Audio</option>
								<option value="Quote">Quote</option>
							</select>
						</div>
						<div class="post_type_area">

						</div>
						<div class="form-group">
							<label for="">Content</label>
							<textarea id="post_editor" name="" id="" class="form-control"></textarea>
						</div>
						
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xl-3 d-flex">
			<div class="card flex-fill">
				<div class="card-header">
					<h4 class="card-title">Category & Tags</h4>
				</div>
				{{-- alert message --}}
				@if (Session::has("success"))

                <p class="alert alert-success">{{ Session::get("success") }} <button class="close" data-dismiss="alert">&times;</button> </p>
                
                @endif
				{{-- error message --}}
				@if ($errors -> any())
					<p class="alert alert-danger">{{ $errors -> first() }} <button class="close" data-dismiss="alert">&times;</button> </p>
				@endif


				<div class="card-body">
					<h6>Select Categories</h6>
				    <hr>
					<ul style="list-style: none">
						@forelse ($cats as $cat)
							<li><input type="checkbox" value="{{ $cat -> id }}" id="{{ $cat -> name }}"> <label for="{{ $cat -> name }}">{{ $cat -> name }}</label> </li>
						@empty
							<li class="text-danger text-center">No Categories Found</li>
						@endforelse
					</ul>
					<h6>Select Tags</h6>
					<hr>
					<select class="post_tags form-control" name="cat[]" multiple="multiple">
						@forelse ($tags as $tag)
						<option value="">{{ $tag -> name }}</option>
						@empty
						<li class="text-danger text-center">No Categories Found</li>
						@endforelse
					</select>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection