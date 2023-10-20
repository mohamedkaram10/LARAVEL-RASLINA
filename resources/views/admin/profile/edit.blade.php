@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            {{-- Profile Information --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Profile : {{ $user->name }}</h4><br><br>
                            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="name" type="text"
                                            value="{{ $user->name }}" id="name">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="username" type="text"
                                            value="{{ $user->username }}" id="username">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="email" type="email"
                                            value="{{ $user->email }}" id="email">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Image Uplode</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="image" type="file" id="uplodeImage">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="showImage"
                                            src="{{ !empty($user->image) ? asset($user->image) : asset('uploads/default.png') }}"
                                            class="rounded avatar-lg" alt="User Iamge">
                                    </div>
                                </div>
                                <!-- end row -->
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Update
                                    Profile</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>



            {{-- Password Change --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Change Password</h4><br><br>
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissable fade show">{{ $error }}</p>
                            @endforeach
                        @endif
                            <form action="{{ route('admin.profile.change.password') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="old_password" type="password" id="old_password">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="new_password" type="password" id="new_password">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="password_confirmation" class="col-sm-2 col-form-label">Password
                                        Confirmation</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="password_confirmation" type="password"
                                            id="password_confirmation">
                                    </div>
                                </div>
                                <!-- end row -->
                                <button class="btn btn-primary waves-effect waves-light" type="submit">Update
                                    Password</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
