@extends('layouts.app')

@section('content')
    <!-- <div class="row">
      <div class="col-lg-12 margin-tb">
        <div class="pull-left">
          <h2>Show Student</h2>
        </div>
        <div class="pull-right">
          <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
      </div>
    </div> -->

    <!-- <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Name:</strong>
          {{ $student->name }}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Email:</strong>
          {{ $student->email }}
        </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Roles:</strong>
          @if(!empty($student->getRoleNames()))
            @foreach($student->getRoleNames() as $v)
              <label class="badge badge-success">{{ $v }}</label>
            @endforeach
          @endif
        </div>
      </div>
    </div> -->

    <div class="container">
      <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" style="color: #6c757d !important;">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('students.index') }}" style="color: #6c757d !important;">Studens</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #9c8a4c !important;">Student Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if(isset($student->profile))
                    <img src="{{asset('public/images')}}/{{$student->profile}}" alt="Admin" class="rounded-circle" width="150">
                    @else
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    @endif

                    <div class="mt-3">
                      <h4>{{$student->name ?? 'N/A'}}</h4>
                      <p class="text-secondary mb-1">{{$student->email ?? 'N/A'}}</p>

                      <p class="text-muted font-size-sm">{{$student->address ?? 'N/A'}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$student->name ?? 'N/A'}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$student->email ?? 'N/A'}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$student->phone ?? 'N/A'}}
                    </div>
                  </div>
                  <hr>
                  <!-- <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        (320) 380-4539
                    </div>
                  </div>
                  <hr> -->
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Date Of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$student->dob ?? 'N/A'}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Country</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$student->country_name ?? 'N/A'}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Catagory</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        STANDARD
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{$student->address ?? 'N/A'}}
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h4 class="d-flex align-items-center mb-3">Courses </h4>
                      @foreach ($select as $key => $value )
                      <div class="row">
                        <div class="col-sm-3"  style="padding-left: 10px;">
                          <h6 class="mb-0"> {{$value->csourse->course_name}}</h6>
                        </div>
                        <div class="col-sm-6 text-secondary">
                            {{date('d-m-Y', strtotime($value->csourse->created_at))}}
                        </div>
                      </div>
                      <hr>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h4 class="d-flex align-items-center mb-3">Teacher</h4>
                      @foreach ($select as $key => $value )
                        <p><b>{{$value->teacher->name}}</b></p>
                        <hr>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
@endsection
