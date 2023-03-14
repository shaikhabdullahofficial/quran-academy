@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Courses</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teachers.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <style>
        th{
            font-family: 'Times New Roman';
        }
        /* .card {
            background-color: #9c8a4c
        } */
    </style>
    <div class="col-md-12 mt-5">
        <div class="card mb-3">
            <div class="card-body">
                {{-- <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Course Name:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $course->course_name ?? 'N/A'}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Student Fee:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $course->student_fee ?? 'N/A' }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Teacher Fee:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $course->teacher_fee ?? 'N/A' }}
                    </div>
                </div>
                <hr> --}}
                <table class="table table-hover fs-2">
                    <tr>
                        <th class="text-center">Course Name</th>
                        <th class="text-center">Student Fee</th>
                        <th class="text-center">Teacher Fee</th>
                    </tr>
                    <tr>
                        <td class="text-center">{{ $course->course_name ?? 'N/A'}}</td>
                        <td class="text-center">{{ $course->student_fee ?? 'N/A'}}</td>
                        <td class="text-center">{{ $course->teacher_fee ?? 'N/A'}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
        <!-- <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                <small>Web Design</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Website Markup</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>One Page</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Mobile Template</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Backend API</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-sm-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                <small>Web Design</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Website Markup</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>One Page</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Mobile Template</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Backend API</small>
                <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                </div>
            </div>
            </div>
        </div> -->
    </div>


    {{-- <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $teacher->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $teacher->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($teacher->getRoleNames()))
                    @foreach($teacher->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </div>
        </div>
    </div> --}}
@endsection
