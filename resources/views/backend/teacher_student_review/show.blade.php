@extends('layouts.app')


@section('content')

<section class="timeline_area section_padding_130">

    <div class="container">
        <div class="row">
            <h3 class="fs-1">Teacher Student Review Details</h3>
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
                    <th>Student Name</th>
                    {{-- <th>Teacher Name</th> --}}
                    <th>Course Name</th>
                    <th>Comment</th>
                    <th>Description</th>
                    <th>Rating</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($all_review as $ar)
                <tr>
                    <!-- for teacher -->
                    {{-- <?php $teacher = DB::table('users')->where('id',$ar->teacher_id)->first();?> --}}

                    <!-- for student -->
                    <?php $student = DB::table('student_profiles')->where('id',$ar->student_id)->first();?>


                    <td>{{ $student->first_name ?? 'N/A' }} {{ $student->last_name ?? 'N/A' }}</td>
                    {{-- <td>{{ $teacher->name ?? 'N/A' }}</td> --}}
                    <td>{{ $ar->course_id ?? 'N/A' }}</td>
                    <td>{{ $ar->comment ?? 'N/A' }}</td>
                    <td>{{ $ar->description ?? 'N/A' }}</td>
                    <td>{{ $ar->rating ?? 'N/A' }}</td>
                    <td><a href="{{ route('edit.review', ['id' => $ar->id]) }}" class="btn btn-info" ><i class="fas fa-edit"></i></i></a>
                        <a href="{{ route('delete.review', ['id' => $ar->id]) }}" class="btn btn-primary" ><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
