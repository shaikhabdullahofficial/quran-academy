@extends('layouts.app')

@section('content')



<nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item fs-5"><a href="{{ route('dashboard') }}" style="color: #6c757d !important;">Home</a></li>
        <li class="breadcrumb-item fs-5"><a href="{{ route('studet-package-index') }}" style="color: #6c757d !important;">Studet Package</a></li>
        <li class="breadcrumb-item active fs-5" aria-current="page" style="color: #9c8a4c !important;">Studet Package Create</li>
    </ol>
</nav>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create New Student</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
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



    {!! Form::open(array('route' => 'studet-package-store','method'=>'POST')) !!}
    <div class="row">
        {{-- <input type="hidden" value="{{$roles->name}}" name="roles"> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Principle Type:</strong>
                {!! Form::text('principle_type', null, array('placeholder' => 'Principle','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                {!! Form::date('date', null, array('placeholder' => 'Date','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Days:</strong>
                <Select class="form-control" name="days">
                    <option value="" selected disabled>Select Days</option>
                    <option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                </Select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class Timing:</strong>
                <Select class="form-control" name="class_time">
                    <option value="" selected disabled>Select Timing</option>
                    <option value="9 to 10">9 to 10</option>
                    <option value="10 to 11">10 to 11</option>
                    <option value="11 to 12">11 to 12</option>
                    <option value="1 to 3">1 to 3</option>
                </Select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time:</strong>
                {!! Form::time('time', null, array('placeholder' => 'Time','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {!! Form::number('price', null, array('placeholder' => 'Price','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection
