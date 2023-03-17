@extends('layouts.app')


@section('content')
<style>
    h4
    {
        font-weight: bold ;
        font-size: 15px;
    }
    p
    {
        font-size: 13px;
        color: gray;
        font-weight: bolder;
    }
</style>


<section class="timeline_area section_padding_130">
    <div class="container">
        <div class="row">
            <h3 class="fs-1">More Details</h3>
        </div>
    </div>
    <br>

    <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item fs-5 fw-semibold"><a href="{{ route('dashboard') }}" style="color: #6c757d !important;">Home</a></li>
            <li class="breadcrumb-item fs-5 fw-semibold"><a href="{{ route('students') }}" style="color: #6c757d !important;">Students</a></li>
            <li class="breadcrumb-item active fw-semibold fs-5" aria-current="page" style="color: #9c8a4c !important;">Teacher Student Details</li>
        </ol>
    </nav>
    <br><br>

    <div class="container">
        @foreach($student_details as $s_detail)
        <div class="row">
            <div class="col-md-3">
                <h4>First Name:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->first_name ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Last Name:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->last_name ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Student Name:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->first_name ?? 'N/A' }} {{ $s_detail->last_name ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Teacher Name:</h4>
            </div>
            <div class="col-md-3">
                <!-- for teacher -->
                <?php $teacher = DB::table('users')->where('id',$s_detail->teacher_id)->first();?>
                <p>{{ $teacher->name ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Email:</h4>
            </div>
            <div class="col-md-3"><p>{{ $s_detail->email ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Phone No:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->phone ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Gender:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->gender ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Age:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->age ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Country:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->country_name ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Address:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->country ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Course:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->course ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Class Type:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->class_type ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Language:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->language ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Total Child:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->total_child ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Total Male:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->total_male ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Total Female:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->total_female ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Individual Child:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->individual_child ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Group Child:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->group_child ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Available Time:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->available_times ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Level:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->level ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Price Type:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->price_type ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Price:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->price ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Package Type:</h4>
            </div>
            <div class="col-md-3">
                <p>{{ $s_detail->package_type ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <h4>Image:</h4>
            </div>
            <div class="col-md-3">
                <img src="images/{{ $s_detail->profile }}" alt="profile" width="80px">
            </div>
        </div>

        @endforeach
    </div>


</section>

@endsection
