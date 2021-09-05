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
		<div class="col-xl-6 d-flex m-auto">
			<div class="card flex-fill">
				<div class="card-header">
					<h4 class="card-title">Edit Staff Data - {{ $data -> name }}</h4>
				</div>
				<div class="card-body">
					<form action="{{ route("staff.update",$data -> id) }}" method="POST" enctype="multipart/form-data">
						@csrf
						@method("PUT")
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Name</label>
							<div class="col-lg-9">
								<input name="name" value="{{ $data -> name }}" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Email</label>
							<div class="col-lg-9">
								<input name="email" value="{{ $data -> email }}" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Cell</label>
							<div class="col-lg-9">
								<input name="cell" value="{{ $data -> cell }}" type="text" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Location</label>
							<div class="col-lg-9">
								<select name="location" class="form-control">
									<option @if($data -> location == "" ) @endif value="">Select</option>
									<option @if($data -> location == "Mirpur" ) selected @endif value="Mirpur">Mirpur</option>
									<option @if($data -> location == "Uttara" ) selected @endif value="Uttara">Uttara</option>
									<option @if($data -> location == "Dhanmondi" ) selected @endif value="Dhanmondi">Dhanmondi</option>
									<option @if($data -> location == "Badda" ) selected @endif value="Badda">Badda</option>
									<option @if($data -> location == "Gulshan" ) selected @endif value="Gulshan">Gulshan</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Gender</label>
							<div class="col-lg-9">
								<div class="form-check form-check-inline">
									<input class="form-check-input" @if($data -> gender == "Male") checked @endif type="radio" name="gender" id="gender_male" value="Male" checked="">
									<label class="form-check-label" for="gender_male">
									Male
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" @if($data -> gender == "Female") checked @endif type="radio" name="gender" id="gender_female" value="Female">
									<label class="form-check-label" for="gender_female">
									Female
									</label>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label"></label>
							<div class="col-lg-6">
								<input name="old_photo" type="hidden" value="{{ $data -> photo }}">
								<img style="width:100px" src="{{ url("/") }}/media/staff/{{ $data -> photo }}" alt="">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-lg-3 col-form-label">Photo</label>
							<div class="col-lg-9">
								<input name="new_photo" type="file" class="form-control">
							</div>
						</div>
						<div class="text-left">
							<a style="float: left" class="btn btn-warning" href="{{ route("staff.index") }}">Back</a>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection