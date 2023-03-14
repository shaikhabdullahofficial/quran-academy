@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Course</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('course.index') }}"> Back</a>
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


    {!! Form::model($course, ['method' => 'PATCH','route' => ['course.update', $course->id]]) !!}

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <label for="course_name">Course Name <span style="color:red">*</span></label>
               <input type="text" name="course_name" value="{{$course->course_name}}" class="form-control" placeholder="Enter Course Name" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <label for="student_fee">Student Fee <span style="color:red">*</span></label>
               <input type="text" name="student_fee" value="{{$course->student_fee}}" class="form-control" placeholder="Enter Student Fee" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <label for="teacher_fee">Teacher Fee <span style="color:red">*</span></label>
               <input type="text" name="teacher_fee" value="{{$course->teacher_fee}}" class="form-control" placeholder="Enter Teacher Fee" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection 