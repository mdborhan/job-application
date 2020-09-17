@extends('layouts.master')
@section('title')
    Job Application Site
    @endsection
@section('content')
    @include('navbar.nav')
        <div class="container mt-5">


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
                        <a href="{{route('apply')}}" class="btn btn-primary">Apply</a>
                    </div>
                </div>
                </div>
            </div>
                    <br>
            @endforeach
            {{$jobs->links()}}


        </div>
    @endsection
