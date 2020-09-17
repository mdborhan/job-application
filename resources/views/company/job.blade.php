@extends('layouts.master')
@section('content')
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">Company Dashboard </div>
            <div class="list-group list-group-flush">
                <a href="{{route('company.dashboard')}}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="{{route('job.post')}}" class="list-group-item list-group-item-action bg-light">Job Post</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            @include('company.nav')

            <div class="content-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    <strong>Success: </strong>{{Session::get('success')}}

                                </div>
                            @endif
                            <h4 class="card-title">Add Job Post</h4>
                            <p class="text-right">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTitle">Add Job Post</button>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="table_id">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Salary</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Country</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach($jobs as $job)
                                            <tr>
                                                <th scope="row">{{ $i++ }}</th>
                                                <td>{{ $job->title }}</td>
                                                <td>{{$job->description }} </td>
                                                <td>{{$job->salary }} </td>
                                                <td>{{$job->location }} </td>
                                                <td>{{$job->country }} </td>

                                              <td>
                                                    <div class="d-flex">
{{--                                                        <a href="#editCategory-{{ $job->id }}" data-toggle="modal" class="btn btn-primary">Edit</a>--}}
                                                        <a href="#deleteCategory-{{ $job->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal for delete course -->
                                            <div id="deleteCategory-{{ $job->id }}" class="modal fade">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><i class="fa fa-trash text-danger" aria-hidden="true"></i></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('delete.job.post') }}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <p>Are you want to delete this?</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input type="hidden" name="id" value="{{ $job->id }}">
                                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

{{--                                            <div id="editCategory-{{ $blogtitle->id }}" class="modal fade">--}}
{{--                                                <div class="modal-dialog" role="document">--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-header">--}}
{{--                                                            <h5 class="modal-title">Edit Blog Title</h5>--}}
{{--                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                                <span aria-hidden="true">&times;</span>--}}
{{--                                                            </button>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-body">--}}
{{--                                                            <form action="{{ route('update.blog.title') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                                                @csrf--}}
{{--                                                                <div class="form-group">--}}
{{--                                                                    <label class="control-label">Title<span class="text-danger">*</span></label>--}}
{{--                                                                    <input type="text" name="title" value="{{ $blogtitle->title }}" class="form-control" >--}}
{{--                                                                    <input type="hidden" name="id" value="{{ $blogtitle->id }}" class="form-control" >--}}
{{--                                                                </div>--}}
{{--                                                                <div class="form-group">--}}
{{--                                                                    <label class="control-label">Description<span class="text-danger">*</span></label>--}}
{{--                                                                    <input type="text" name="description" value="{{ $blogtitle->description }}" class="form-control" placeholder="name">--}}

{{--                                                                </div>--}}
{{--                                                                --}}{{--                                                        <div class="form-group">--}}
{{--                                                                --}}{{--                                                            <label class="control-label">Status</label>--}}
{{--                                                                --}}{{--                                                            <select name="status" class="form-control">--}}
{{--                                                                --}}{{--                                                                @if($title->status == 1)--}}
{{--                                                                --}}{{--                                                                    <option value="1" class="form-control">Active</option>--}}
{{--                                                                --}}{{--                                                                    <option value="0" class="form-control">Inactive</option>--}}
{{--                                                                --}}{{--                                                                @else--}}
{{--                                                                --}}{{--                                                                    <option value="0" class="form-control">Inactive</option>--}}
{{--                                                                --}}{{--                                                                    <option value="1" class="form-control">Active</option>--}}
{{--                                                                --}}{{--                                                                @endif--}}
{{--                                                                --}}{{--                                                            </select>--}}
{{--                                                                --}}{{--                                                        </div>--}}
{{--                                                                <div class="form-group">--}}
{{--                                                                    <button type="submit" class="btn btn-primary">Update Save</button>--}}
{{--                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                                </div>--}}
{{--                                                            </form>--}}

{{--                                                        </div>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="addTitle" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Job Post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            @if(count($errors)>0)
                                <div class="alert alert-danger">
                                    <strong>Error:</strong>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>

                                </div>
                            @endif
                            <form action="{{ route('add.job.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="control-label">Job Title<span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Job Title">
                                    <input type="hidden" name="company_id" id="company_id" class="form-control" value="{{ Auth::user()->id }}" >
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Job Description<span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>

                                </div>
                                <div class="form-group">
                                    <label class="control-label">Job Salary<span class="text-danger">*</span></label>
                                    <input type="text" name="salary" class="form-control" placeholder="Enter Job Salary">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Location<span class="text-danger">*</span></label>
                                    <input type="text" name="location" class="form-control" placeholder="Enter Location">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Country<span class="text-danger">*</span></label>
                                    <input type="text" name="country" class="form-control" placeholder="Enter Country">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save Post</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
