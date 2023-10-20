@extends('admin.layouts.master')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="my-3">Cards Masonry</h4>
                    <div class="row" data-masonry='{"percentPosition": true }'>
                        <div class="col-sm-6 col-lg-6">
                            <div class="card">

                                <br>
                                <center>
                                    <img src="{{ (!empty($user->image)) ? asset($user->image) : asset('uploads/default.png') }}"
                                        class="rounded-circle avatar-xl" alt="User image">
                                </center>

                                <div class="card-body">
                                    <h4 class="card-title">Name : {{ $user->name }}</h4>
                                    <hr>
                                    <h4 class="card-title">User Name : {{ $user->username }}</h4>
                                    <hr>
                                    <h4 class="card-title">Email : {{ $user->email }}</h4>
                                    <hr>
                                    <a href="{{ route('admin.profile.edit', $user->id) }}" class="btn btn-success waves-effect waves-light">Edit Profile</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </div>
            </div>
        </div>
    </div>
@endsection
