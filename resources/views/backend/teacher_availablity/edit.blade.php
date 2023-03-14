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
        .class_day:active::placeholder {
            color: red;
        }
    </style>
@endpush

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit New Teacher</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teachers.index') }}"> Back</a>
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


    <form method="post" action="{{ route('teacher_availablity.update' , $teacher_availablity->id) }}">
        @csrf
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="availablity_name">Schedule Type <span style="color:red;">*</span></label>
                    <select name="availablity_name" id="availablity_name" class="form-control">
                        <option value="{{ isset($teacher_availablity->availablity_name)? $teacher_availablity->availablity_name : 'N/A' }}" selected>{{ isset($teacher_availablity->availablity_name)? $teacher_availablity->availablity_name : 'N/A' }}</option>
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
                        <option value="{{$teacher_availablity->class_type}}" selected>{{$teacher_availablity->class_type}}</option>
                        <option value="week">Week</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12"> 
                <div class="form-group" id="class_day">
                    <label for="class_day">Class Day <span style="color:red;">*</span></label>
                    <select name="class_day[]" id="choices-multiple-remove-button" class="form-control class_day" multiple>
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
                    <label for="start_date">Start Date <span style="color:red;">*</span></label>
                    <input type="date" name="start_date" value="{{$teacher_availablity->start_date}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="end_date">End Date <span style="color:red;">*</span></label>
                    <input type="date" name="end_date" value="{{$teacher_availablity->end_date}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="start_time">Start Time <span style="color:red;">*</span></label>
                    <input type="time" name="start_time" value="{{$teacher_availablity->start_time}}" class="form-control">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="end_time">End Time <span style="color:red;">*</span></label>
                    <input type="time" name="end_time" value="{{$teacher_availablity->end_time}}" class="form-control">
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
    $(document).ready(function() {
        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        removeItemButton: true,
        maxItemCount:7,
        searchResultLimit:7,
        renderChoiceLimit:7
        }); 
       
        var aa =   $('.choices');
        var myArray =  '{!! json_encode($array) !!}';

        var values = aa.find('.choices__item--selectable').map(function() {
            return $(this).attr('data-value');
        }).get();

        let add = values.filter((item) => myArray.includes(item));

        for (let index = 0; index < add.length; index++) {
            $(`.choices [data-value='${add[index]}']`).hide();
            $(`.choices__list--multiple`).append(`<div class="choices__item choices__item--selectable selected_days" data-item="" data-id="1" data-value="${add[index]}" data-custom-properties="null" data-deletable="" aria-selected="true">
            ${add[index]}
            <button type="button" class="choices__button" data-button="" aria-label="Remove item: 'friday'">
                Remove item
            </button>
            </div>`);
            $(`.class_day`).append(`<option value="${add[index]}" class="selected_option" selected="${add[index]}"></option>`);
        }
    });

    $(document).on('click' , '.choices__item--selectable' , function(){
        var remove_data = $(this).remove();
        var choices_multiple = $('.choices__list--multiple .choices__item--selectable');
        var remove_word = $(this).attr('data-value');
        var selected_options = $('.class_day option');
        var valuesget = $.map(selected_options ,function(selected_options) {
            return selected_options.value;
        });
        var maatch_data = $.inArray(remove_word , valuesget)
        if(maatch_data !== -1){
            $(`.class_day [value='${remove_word}']`).remove();
        }
        $(`.choices [data-value='${remove_word}']`).show();
    });

</script>
@endpush