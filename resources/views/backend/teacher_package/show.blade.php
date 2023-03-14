@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Show Teacher Package</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="{{ route('teacher-package') }}" style="padding: calc(0.75rem + -3px) calc(1rem + -3px) !important;"> Back</a>
            </div>
        </div>
    </div>

  
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Availablity Name</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $teacher_package->availablity_name ?? 'N/A'}}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Course Name:</h6>
                    </div>
                    <div class="col-sm-9 ">
                        {{ isset($teacher_package->hasCourse)? $teacher_package->hasCourse->course_name : 'N/A' }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Class Type:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $teacher_package->class_type ?? 'N/A' }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Class Days:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $teacher_package->class_days ?? 'N/A' }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Class Fee:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $teacher_package->course_fee ?? 'N/A' }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Start Time:</h6>
                    </div>
                    <div class="col-sm-9 ">
                        {{ $teacher_package->start_time ?? 'N/A' }}
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">End Time:</h6>
                    </div>
                    <div class="col-sm-9">
                        {{ $teacher_package->end_time ?? 'N/A' }}
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
@endsection
