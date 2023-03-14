@extends('layouts.app')

@section('content')


<nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item fs-5"><a href="{{ route('dashboard') }}" style="color: #6c757d !important;">Home</a></li>
        <li class="breadcrumb-item fs-5"><a href="{{ route('course.index') }}" style="color: #6c757d !important;">Course</a></li>
        <li class="breadcrumb-item active fs-5" aria-current="page" style="color: #9c8a4c !important;">Course Create</li>
    </ol>
</nav>

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Course</h2>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif



    <form method="post" action="{{ route('course.store') }}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="course_name">Course Name <span style="color:red;">*</span></label>
                    <input type="text" name="course_name" id="course_name" class="form-control" placeholder="Enter Course Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="student_fee">Student Fee <span style="color:red;">*</span></label>
                    <input type="text" name="student_fee" id="student_fee" class="form-control" placeholder="Enter Student Fee">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="teacher_fee">Teacher Fee <span style="color:red;">*</span></label>
                    <input type="text" name="teacher_fee" id="teacher_fee" class="form-control" placeholder="Enter Teacher Fee">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    {!! Form::close() !!}


@endsection
