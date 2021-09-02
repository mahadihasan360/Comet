@extends('admin.layouts.app')
@section('page-name',"Profile")

@section('main')
<div class="content container-fluid">
					
	@include('page-header')

	<div class="container-fluid">
		<!-- ============================================================== -->
		<!-- Start Page Content -->
		<!-- ============================================================== -->
		<!-- Row -->
		<div class="row">
			<!-- Column -->
			<div class="col-lg-4 col-xlg-3 col-md-5">
				<div class="card">
					<div class="card-body">
						<center class="m-t-30">
							@if (Auth::user() -> photo == NULL && Auth::user() -> gender == "Male" )
							<img src="admin/assets/img/avatar-1.png" class="rounded-circle" width="150">
							@elseif(Auth::user() -> photo == NULL && Auth::user() -> gender == "Female")
							<img src="admin/assets/img/avatar-2.png" class="rounded-circle" width="150">
							@elseif(Auth::user() -> photo == NULL)
							<img src="admin/assets/img/avatar-3.png" class="rounded-circle" width="150">
							@elseif(Auth::user() -> photo != NULL)
							<img src="{{ url("") }}/media/users/{{ Auth::user() -> photo }}" class="rounded-circle" width="150" height="150px">
							@endif
							<h4 class="card-title m-t-10">{{ Auth::user() -> name }}</h4>
							<h6 style="text-align: left !important">Bio : </h6><h6 style="text-align: left !important">{{ Auth::user() -> bio }}</h6>
						</center>
					</div>
					<div>
						<hr>
					</div>
					<div class="card-body"> <small class="text-muted">Username </small>
						<h6>{{ Auth::user() -> username }}</h6> <small class="text-muted">Email address </small>
						<h6>{{ Auth::user() -> email }}</h6> <small class="text-muted p-t-30 db">Phone</small>
						<h6>{{ Auth::user() -> cell }}</h6> <small class="text-muted p-t-30 db">Address</small>
						<h6>{{ Auth::user() -> address }}</h6>
						<small class="text-muted p-t-30 db">Social Profile</small>
						<br>
						@if(isset($social -> fb))
						<button class="btn btn-circle btn-primary mr-2"><i class="fab fa-facebook-f"><a href="{{ $social ->fb }}"></a></i></button>
						@endif
						@if(isset($social -> tw))
						<button class="btn btn-circle btn-success mr-2"><i class="fab fa-twitter"></i></button>
						@endif
						@if(isset($social -> lin))
						<button class="btn btn-circle btn-danger mr-2"><i class="fab fa-linkedin"></i></button>
						@endif
						@if(isset($social -> insta))
						<button class="btn btn-circle btn-warning mr-2"><i class="fab fa-instagram"></i></button>
						@endif
					</div>
				</div>
			</div>
			<!-- Column -->
			<!-- Column -->
			<div class="col-lg-8 col-xlg-9 col-md-7">
				<div class="card">
					<div class="card-body">
						@include('validate')
						<form class="form-horizontal form-material mx-2" action="{{ route("user.profile.update") }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="form-group">
								<label class="col-md-12">Name</label>
								<div class="col-md-12">
									<input name="name" value="{{ Auth::user() -> name }}" type="text" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label for="example-email" class="col-md-12">Email</label>
								<div class="col-md-12">
									<input name="email" value="{{ Auth::user() -> email }}" type="email" class="form-control form-control-line"  id="example-email">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Cell</label>
								<div class="col-md-12">
									<input name="cell" value="{{ Auth::user() -> cell }}" type="text" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Username</label>
								<div class="col-md-12">
									<input name="username" value="{{ Auth::user() -> username }}" type="text" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-12 col-form-label">Gender</label>
								<div class="col-lg-9">
									<div class="form-check form-check-inline">
										<input @if(Auth::user() -> gender == "Male") checked @endif class="form-check-input" type="radio" name="gender" id="gender_male" value="Male" checked="">
										<label class="form-check-label" for="gender_male">
										Male
										</label>
									</div>
									<div class="form-check form-check-inline">
										<input @if(Auth::user() -> gender == "Female") checked @endif class="form-check-input" type="radio" name="gender" id="gender_female" value="Female">
										<label class="form-check-label" for="gender_female">
										Female
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Bio</label>
								<div class="col-md-12">
									<textarea name="bio" class="form-control">{{ Auth::user() -> bio }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Address</label>
								<div class="col-md-12">
									<input name="address" value="{{ Auth::user() -> address }}" type="text" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Facebook</label>
								<div class="col-md-12">
									<input name="fb" @if(isset($social -> fb)) value="{{ $social -> fb }}"  @endif  type="text" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Twitter</label>
								<div class="col-md-12">
									<input name="tw" @if(isset($social -> tw)) value="{{ $social -> tw }}"  @endif  type="text" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Linkedin</label>
								<div class="col-md-12">
									<input name="lin" @if(isset($social -> lin)) value="{{ $social -> lin }}"  @endif  type="text" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Instagram</label>
								<div class="col-md-12">
									<input name="insta" @if(isset($social -> insta)) value="{{ $social -> insta }}"  @endif  type="text" class="form-control form-control-line">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-12">Photo</label>
								<div class="col-md-12">
									<input type="file" name="photo">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<button class="btn btn-success text-white">Update Profile</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Column -->
		</div>
		<!-- Row -->
		<!-- ============================================================== -->
		<!-- End PAge Content -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Right sidebar -->
		<!-- ============================================================== -->
		<!-- .right-sidebar -->
		<!-- ============================================================== -->
		<!-- End Right sidebar -->
		<!-- ============================================================== -->
	</div>
	
</div>
@endsection