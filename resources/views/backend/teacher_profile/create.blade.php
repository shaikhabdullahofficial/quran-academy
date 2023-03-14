@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Teacher Profile</h2>
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



    <form method="post" action="{{ route('teachers_profile.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Profile Video <span style="color:red;">*</span></label>
                    <input type="file" name="video" id="profile_video" accept="video/*" class="form-control">
                    @if(isset($teacher_profile->video))
                        <video id="preview" src="{{ asset('public/assets/media/profile_video') }}/{{$teacher_profile->video}}" style="width: 200px; margin-top: 10px;height: 145px;" controls></video>
                    @else
                        <video id="preview" style="display:none; width: 200px; margin-top: 10px;" controls></video>
                    @endif
                </div>
            </div>
            <!-- <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="name">Country Flag <span style="color:red;">*</span></label>
                    <input type="file" name="flag" id="flag" class="form-control" accept="image/*">
                    @if(isset($teacher_profile->country_flag))
                    <img src="{{ asset('public/assets/media/country_flag') }}/{{$teacher_profile->country_flag}}" id="flag_preview" style="width:200px;height:150px;margin-top:10px;" />
                    @else
                    <img src="" id="flag_preview" style="width:200px;height:150px;margin-top:10px;display:none;" />
                    @endif
                </div>
            </div> -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="name">Name <span style="color:red;">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{isset($teacher_profile->name)? $teacher_profile->name : '' }}" placeholder="Enter Your Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="country">Country Name<span style="color:red;">*</span></label>
                    <select name="country" id="country" class="form-control">
                        <option value="{{isset($teacher_profile->country_name)? $teacher_profile->country_name : ''}}" selected>{{isset($teacher_profile->country_name)? $teacher_profile->country_name : 'Select Your Country'}}</option>
                        @foreach($countries as $country)
                        <option value="{{ $country->name }}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="country">Course Name<span style="color:red;">*</span></label>
                    <select name="teacher_expertise[]" id="teacher_expertise" class="form-control teacher_expertise" Multiple>
                       
                        @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{$course->course_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="teacher_fee">Teacher Fee <span style="color:red;">*</span></label>
                    <input type="text" name="teacher_fee[]" id="teacher_fee" class="form-control" value="{{ isset($teacher_profile->teacher_fee) ? $teacher_profile->teacher_fee : 'N/A' }}" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="description">Description <span style="color:red;">*</span></label>
                    <textarea name="description" class="form-control ckeditor">{{isset($teacher_profile->description)? $teacher_profile->description : '' }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="about">About Us <span style="color:red;">*</span></label>
                    <textarea name="about" class="form-control ckeditor">{{isset($teacher_profile->about)? $teacher_profile->about : '' }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="experience">Experience <span style="color:red;">*</span></label>
                    <textarea name="experience" class="form-control ckeditor">{{isset($teacher_profile->experience)? $teacher_profile->experience : '' }}</textarea>
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<!-- Include JavaScript and CSS files -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        var aa =   $('.teacher_expertise');
        var myArray =  '{!! json_encode($array) !!}';
        var values = aa.find('option').map(function() {
            return $(this).val();
        }).get();
        let add = values.filter((item) => myArray.includes(item))
        for (let index = 0; index < add.length; index++) {
                $(`.teacher_expertise [value='${add[index]}']`).prop('selected', true);;
        }

       $('.ckeditor').ckeditor();
    });

</script>
<!-- <script type="text/javascript">
    function readURL(input) {
        $('#flag_preview').css("display","block");
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#flag_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#flag").change(function(){
        readURL(this);
    });
</script> -->
<script>
  const videoInput = document.getElementById('profile_video');
  const preview = document.getElementById('preview');

  videoInput.addEventListener('change', function() {
    preview.style.display="block";
    const file = videoInput.files[0];
    const fileURL = URL.createObjectURL(file);
    preview.src = fileURL;
  });
</script>
<script>
    $(document).on('change' ,'.teacher_expertise', function() {
        var courseId = $(this).val();
        var course_name = $(this).html();
        $('#teacher_fee').val('');
        if(courseId == 'select_course'){
            $('#teacher_fee').val('');
        }
    
        $.ajax({
            type: "GET",
            url: '/quran_academy/get-price',
            dataType:'json',
            data:{
                course_id:courseId
            },
            success: function(response) {
            $('#teacher_fee').val(response.teacher_fee);
            }
        });
    });
</script>
@endpush
