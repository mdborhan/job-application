@extends('layouts.master')
@section('title')
    Company Dashboard
    @endsection
@section('content')

    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Company Dashboard </div>
            <div class="list-group list-group-flush">
                <a href="" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="{{route('job.post')}}" class="list-group-item list-group-item-action bg-light">Job Post</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            @include('company.nav')

            <div class="container-fluid">
                <h1 class="mt-4">Applicants</h1>
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_id">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Applicant Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Resume</th>
                                        <th scope="col">Skills</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($applicants as $applicant)
                                        <tr>
                                            <th scope="row">{{ $i++ }}</th>
                                            <td>{{ $applicant->name }}</td>
                                            <td>{{$applicant->email }} </td>
                                            @if($applicant->image)
                                                <td>
                                                    <img src="{{asset($applicant->image)}}" class="rounded-circle" width="200" height="200">
                                                </td>
                                                @else
                                                <td>Not Yet Upload</td>
                                                @endif
                                            @if($applicant->resume)
                                                <td>
                                                    <a href="#" class="btn ah" style="display:block;margin-bottom:10px;text-decoration:none; border:5px solid #00ffdd;padding:5px;font-size:22px;font-weight:900;" data-toggle="modal" data-target="#exampleModal">Look Resume</a>


                                                    <!-- Modal -->
                                                    <div class="modal fade"style=""id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                                        <div class="modal-dialog modal-lg" role="document" style="background:#00ffdd;">
                                                            <div class="modal-content" style="background:#00ffdd;">
                                                                <div class="modal-header">
                                                                    <center><h5 class="modal-title" id="exampleModalLabel" style="color:black;font-weight:900; margin-left:50px;"></h5></center>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <embed src="{!! asset($applicant->resume) !!}" frameborder="0" width="100%" height="400px">
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <style>
                                                                        .abtn1:hover{
                                                                            background:red;
                                                                            color:white;
                                                                        }
                                                                    </style>
                                                                    <a href="#"data-dismiss="modal" class="btn abtn1" style="border:5px solid red; color:black; font-weight:900; fotn-size:18px;">Close</a>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @else
                                                <td>Not Yet Upload</td>
                                                @endif
                                            @if($applicant->skills)
                                                <td>{{$applicant->skills }} </td>
                                                @else
                                                <td>Not Yet Update</td>
                                            @endif





                                        </tr>
                                       @endforeach

                                    </tbody>
                                </table>
                                {{$applicants->links()}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

    @endsection
