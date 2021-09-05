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
		<div class="col-lg-6 m-auto">
			<table class="table">
				<h1 class="text-center">Staff Profile - {{ $data -> name }} -</h1><br><br>
				<img style="width:250px;height:250px;border-radius:50%;margin-left:33%;box-shadow: 0px 0px 30px #963f47bf;" src="{{ url("/") }}/media/staff/{{ $data -> photo }}" alt=""><br><br>
				<tr>
					<td>Name</td>
					<td>{{ $data -> name }}</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>{{ $data -> email }}</td>
				</tr>
				<tr>
					<td>Cell</td>
					<td>{{ $data -> cell }}</td>
				</tr>
				<tr>
					<td>Location</td>
					<td>{{ $data -> location }}</td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>{{ $data -> gender }}</td>
				</tr>
			</table>
			<a class="btn btn-warning" href="{{ route("staff.index") }}">Back</a>
		</div>
	</div>
	
</div>
@endsection