@extends('layouts.app')

@section('content')

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



    {{-- {!! Form::model(['method'=>'POST','PATCH','route' => ['studet-package-update', $student_Package->id]]) !!} --}}
    <form method="POST" action="{{ route('studet-package-update', $student_Package->id) }}">@csrf
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Principle Type:</strong> 
               {!! Form::text('principle_type', $student_Package->principle_type, array('placeholder' => 'Principle', 'class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                {!! Form::date('date',  $student_Package->date, array('placeholder' => 'Date','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Days:</strong>
                <select class="form-control" name="days">
                    <option value="" disabled>Select Days</option>
                    <option value="monday" {{ $student_Package->days === 'monday' ? 'selected' : '' }}>Monday</option>
                    <option value="tuesday" {{ $student_Package->days === 'tuesday' ? 'selected' : '' }}>Tuesday</option>
                    <option value="wednesday" {{ $student_Package->days === 'wednesday' ? 'selected' : '' }}>Wednesday</option>
                    <option value="thursday" {{ $student_Package->days === 'thursday' ? 'selected' : '' }}>Thursday</option>
                    <option value="friday" {{ $student_Package->days === 'friday' ? 'selected' : '' }}>Friday</option>
                    <option value="saturday" {{ $student_Package->days === 'saturday' ? 'selected' : '' }}>Saturday</option>
                    <option value="sunday" {{ $student_Package->days === 'sunday' ? 'selected' : '' }}>Sunday</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Class Timing:</strong>
                <select class="form-control" name="class_time">
                    <option value="" disabled>Select Timing</option>
                    <option value="9 to 10" {{ $student_Package->class_time == '9 to 10' ? 'selected' : '' }}>9 to 10</option>
                    <option value="10 to 11" {{ $student_Package->class_time == '10 to 11' ? 'selected' : '' }}>10 to 11</option>
                    <option value="11 to 12" {{ $student_Package->class_time == '11 to 12' ? 'selected' : '' }}>11 to 12</option>
                    <option value="1 to 3" {{ $student_Package->class_time == '1 to 3' ? 'selected' : '' }}>1 to 3</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Time:</strong>
                {!! Form::time('time',  $student_Package->time, array('placeholder' => 'Time','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {!! Form::number('price',  $student_Package->price, array('placeholder' => 'Price','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
    {{-- {!! Form::close() !!} --}}




@endsection
