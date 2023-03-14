@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Courses</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('course.create') }}"> Create New Course</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
    @endif


    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
            <th>No</th>
            <th>Course Name</th>
            <th>Student Fee</th>
            <th>Teacher Fee</th>
            <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courses as $key => $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->student_fee }}</td>
                    <td>{{ $course->teacher_fee }}</td>
                    <td>
                    <a class="btn btn-info" href="{{ route('course.show',$course->id) }}"> <i class="bi bi-eye"></i></a>
                    <a class="btn btn-primary" href="{{ route('course.edit',$course->id) }}"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger" href="{{ route('course.destroy', $course->id) }}" onclick = archiveFunction() ><i class="bi bi-archive-fill"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


<script>
    function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        })
    }
</script>
@endsection
