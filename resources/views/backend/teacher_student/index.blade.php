@extends('layouts.app')


@section('content')

<section class="timeline_area section_padding_130">

    <div class="container">
        <div class="row">
            <h3 class="fs-1">Teacher Student Details</h3>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{session('success')}}</strong>
    </div>
    @endif

    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Course</th>
                    <th>Teacher Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students_detail as $sd)
                <tr>
                    <!-- for teacher -->
                    <?php $teacher = DB::table('users')->where('id',$sd->teacher_id)->first();?>


                    <td>{{ $sd->first_name ?? 'N/A' }}</td>
                    <td>{{ $sd->last_name ?? 'N/A' }}</td>
                    <td>{{ $sd->first_name ?? 'N/A' }} {{ $sd->last_name ?? 'N/A' }}</td>
                    <td>{{ $sd->email ?? 'N/A' }}</td>
                    <td>{{ $sd->phone ?? 'N/A' }}</td>
                    <td>{{ $sd->course ?? 'N/A' }}</td>
                    <td>{{ $teacher->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('studentdetails', ['id' => $sd->id]) }}" class="btn btn-info" ><i class="bi bi-eye"></i></a>
                        <a href="{{ route('review', ['id' => $sd->id]) }}" class="btn btn-primary" ><i class="fa-solid fa-comments"></i></a>
                   </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
