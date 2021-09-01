@extends('admin.layouts.app')
@section("page-name","Password-Change");

@section('main')
<div class="content container-fluid">
					
	@include('page-header')

    <div class="row">
        <div class="col-xl-6 d-flex m-auto">
            <div class="card flex-fill">
                <div class="card-header">
                    <h4 class="card-title">Change Password</h4>
                    @include('validate')
                </div>
                <div class="card-body">
                    <form action="{{ route("change.user.pass") }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Old Password</label>
                            <div class="col-lg-9">
                                <input name="old_pass" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">New Password</label>
                            <div class="col-lg-9">
                                <input name="password" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Confirm Password</label>
                            <div class="col-lg-9">
                                <input name="password_confirmation" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Change Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	
</div>
@endsection