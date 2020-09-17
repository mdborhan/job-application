@extends('layouts.master')
@section('content')
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Applicant Dashboard </div>
            <div class="list-group list-group-flush">
                <a href="{{route('get.dashboard')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="{{route('get.profile')}}" class="list-group-item list-group-item-action bg-light">Update Profile</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            @include('applicant.nav')

            <div class="content-wrapper">
                <div class="content mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    <strong>Success: </strong>{{Session::get('success')}}

                                </div>
                            @endif

                                    <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="first_name" class="col-md-4 col-form-label text-md-right">Profile Picture</label>
{{--                                            <img src="{{asset($user->image)}}" class="img rounded-circle" width="200" height="200">--}}

                                            <div class="col-md-6">
                                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image"  >
                                                <input  type="hidden" class="form-control" name="id" value="{{Session::get('userId')}}"  >

                                                @if ($errors->has('image'))
                                                    <span class="invalid-feedback">
                <strong>{{ $errors->first('image') }}</strong>
              </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="last_name" class="col-md-4 col-form-label text-md-right">Upload Resume</label>

                                            <div class="col-md-6">
                                                <input id="resume" accept="application/pdf, application/doc" type="file" class="form-control{{ $errors->has('resume') ? ' is-invalid' : '' }}" name="resume"   >

                                                @if ($errors->has('resume'))
                                                    <span class="invalid-feedback">
                <strong>{{ $errors->first('resume') }}</strong>
              </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="username" class="col-md-4 col-form-label text-md-right">Skills</label>

                                            <div class="col-md-6">
                                                <input id="skills" type="text" class="form-control{{ $errors->has('skills') ? ' is-invalid' : '' }}" name="skills"   >

                                                @if ($errors->has('skills'))
                                                    <span class="invalid-feedback">
                <strong>{{ $errors->first('skills') }}</strong>
              </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Update Profile
                                                </button>
                                            </div>
                                        </div>
                                    </form>


                        </div>
                    </div>

                </div>
            </div>


        </div>
        <!-- /#page-content-wrapper -->

    </div>
@endsection
