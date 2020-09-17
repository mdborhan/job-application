@extends('layouts.master')
@section('title')
    Applicant Dashboard
    @endsection
  @if(Session::get('userId'))
@section('content')

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Applicant Dashboard </div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="{{route('get.profile')}}" class="list-group-item list-group-item-action bg-light">Update Profile</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            @include('applicant.nav')

            <div class="container-fluid">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        <strong>Success: </strong>{{Session::get('success')}}

                    </div>
                @endif

                <h1 class="mt-4">Job Post</h1>



                @foreach($jobs as $job)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <h5 class="card-header">Job Post</h5>
                                <div class="card-body">
                                    <h5 class="card-title">{{$job->title}}</h5>
                                    <p class="card-text">{!! $job->description !!}</p>
                                    <h6 class="card-title">Salary: {{$job->salary}}</h6>
                                    <h6 class="card-title">Location: {{$job->location}}</h6>
                                    <h6 class="card-title">Country Name: {{$job->country}}</h6>
                                    <a  href="{{ route('valid.applicant') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('valid-form').submit();" class="btn btn-primary">
                                        {{ __('Apply') }}
                                    </a>

                                    <form id="valid-form" action="{{ route('valid.applicant') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Session::get('userId')}}">
                                        <input type="hidden" name="job_id" value="{{$job->id}}">
                                    </form>
{{--                                    <a href="{{route('valid.applicant',['id'=>Session::get('userId')])}}" class="btn btn-primary">Apply</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach





            </div>
            {{$jobs->links()}}
        </div>
        <!-- /#page-content-wrapper -->

    </div>

@endsection


@else
      @include('navbar.nav')

      @endif

