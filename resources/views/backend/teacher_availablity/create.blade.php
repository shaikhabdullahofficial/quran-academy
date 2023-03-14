@extends('layouts.app')

@section('content')
@push('css')
    <style>
        .mt-100{margin-top: 100px}
        .choices__inner {
            display: inline-block;
            vertical-align: top;
            width: 100%;
            background-color: #ffffff;
            padding-bottom: 29px;
            padding-top: 0px;
            border: 1px solid #ced4da;
            border-radius: 2.5px;
            font-size: 14px;
            min-height: 20px !important;
            height: 20px;
            overflow: hidden;
        }
        .choices__input {
            display: inline-block;
            vertical-align: baseline;
            background-color: #ffffff;
            font-size: 14px;
            margin-bottom: 5px;
            border: 0;
            border-radius: 0;
            max-width: 100%;
            padding: 4px 0 4px 2px;
        }
        .choices__input::placeholder{
            color:#495057 !important;
        }
        .choices__list--multiple .choices__item {
            display: inline-block;
            vertical-align: middle;
            border-radius: 20px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 500;
            margin-right: 3.75px;
            margin-bottom: 3.75px;
            background-color: #9c8a4c;
            border: 1px solid #9c8a4c;
            color: #fff;
            word-break: break-all;
        }
        .choices[data-type*=select-multiple] .choices__button, .choices[data-type*=text] .choices__button {
            border-left: 1px solid #9c8a4c;
        }
        .choices__list--dropdown {
            display: none;
            z-index: 1;
            position: absolute;
            width: 100%;
            background-color: #fff;
            border: 1px solid #ddd;
            top: 100%;
            margin-top: -1px;
            border-bottom-left-radius: 2.5px;
            border-bottom-right-radius: 2.5px;
            overflow: scroll;
            word-break: break-all;
            height: 200px;
        }
    </style>
@endpush


<nav aria-label="breadcrumb" class="main-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item fs-5"><a href="{{ route('dashboard') }}" style="color: #6c757d !important;">Home</a></li>
        <li class="breadcrumb-item fs-5"><a href="{{ route('teacher_availablity.index') }}" style="color: #6c757d !important;">Teacher Availablity</a></li>
        <li class="breadcrumb-item active fs-5" aria-current="page" style="color: #9c8a4c !important;">Teacher Availablity Create</li>
    </ol>
</nav>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Teacher Availablity</h2>
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



    <form method="post" action="{{ route('teacher_availablity.store') }}">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="availablity_name">Schedule Type <span style="color:red;">*</span></label>
                    <select name="availablity_name" id="availablity_name" class="form-control">
                        <option value="" selected>Select Schedule Type</option>
                        <option value="1 times per Week">1 times per Week</option>
                        <option value="2 times per Week">2 times per Week</option>
                        <option value="3 times per Week">3 times per Week</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="class_type">Class Type <span style="color:red;">*</span></label>
                    <select name="class_type" id="class_type" class="form-control">
                        <option value="" selected>Select Class Type</option>
                        <option value="week">Week</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group" id="class_day">
                    <label for="class_day">Class Day <span style="color:red;">*</span></label>
                    <select name="class_day[]" id="choices-multiple-remove-button" class="form-control" multiple>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="start_time">Start Date <span style="color:red;">*</span></label>
                    <input type="date" name="start_date" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="end_time">End Date <span style="color:red;">*</span></label>
                    <input type="date" name="end_date" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="start_time">Start Time <span style="color:red;">*</span></label>
                    <input type="time" name="start_time" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="end_time">End Time <span style="color:red;">*</span></label>
                    <input type="time" name="end_time" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    {!! Form::close() !!}


@endsection
@push('js')
<script>
    $(document).ready(function(){

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:7,
        searchResultLimit:7,
        renderChoiceLimit:7
        });


    });
</script>
@endpush
