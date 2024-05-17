@extends('backend.layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Profile Update</h4>
                </div>
                <form action="{{route('dashboard.profile.profile-update')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Name"
                                    name="name"
                                    value="{{auth('admin')->user()->name}}"
                                />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input
                                    type="email"
                                    class="form-control"
                                    placeholder="Email"
                                    name="email"
                                    value="{{auth('admin')->user()->email}}"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Password Update</h4>
                </div>
                <form action="{{route('dashboard.profile.password-update')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    name="password"
                                />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Password Confirmation</label>
                            <div class="col-sm-9">
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Password"
                                    name="password_confirmation"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
