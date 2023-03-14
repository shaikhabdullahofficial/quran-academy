


@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Courses</h2>
                <h2>Show Schedule Detail</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teacher_availablity.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="col-md-12 mt-5">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Availablity Name:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $teacher_availablity->availablity_name ?? 'N/A'}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Select Course:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{$teacher_availablity->hasCourse->course_name ?? 'N/A' }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Class Type:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $teacher_availablity->class_type?? 'N/A' }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Class Days:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $teacher_availablity->class_days ?? 'N/A' }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Course Fee:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $teacher_availablity->course_fee ?? 'N/A' }}
                    </div>
                </div>
                <hr>

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

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Availablity Type:</strong>
                {{ $teacher_availablity->availablity_name ?? 'N/A' }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class Type:</strong>
                {{ $teacher_availablity->class_type ?? 'N/A' }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class Day:</strong>
                {{ $teacher_availablity->class_days ?? 'N/A' }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Start Date:</strong>
                {{ date('d-m-Y', strtotime($teacher_availablity->start_date)) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>End Date:</strong>
                {{ date('d-m-Y', strtotime($teacher_availablity->end_date)) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Start Time:</strong>
                {{ date('h:i:s' , strtotime($teacher_availablity->start_time)) }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>End Time:</strong>
                {{ date('h:i:s' , strtotime($teacher_availablity->end_time)) }}
            </div>
        </div>
    </div> --}}
@endsection
