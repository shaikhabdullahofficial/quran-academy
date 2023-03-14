@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Teacher Availablity</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('teacher_availablity.create') }}"> Create New Teacher Availablity</a>
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
            <th>Availablity Type</th>
            <th>Class Type</th>
            <th>Class Day</th>
            <th>Start Date</th>
            <th>Start Time</th>
            <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($teacher_availablities as $key => $teacher)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $teacher->availablity_name ?? 'N/A' }}</td>
                    <td>{{ $teacher->class_type ?? 'N/A' }}</td>
                    <td>{{ $teacher->class_days ?? 'N/A' }}</td>
                    <td>{{ date('d-m-Y', strtotime($teacher->start_date)) }}</td>
                    <td>{{ date('h:i:s' , strtotime($teacher->start_time)) }}</td>
                    <td>
                    <a class="btn btn-info" href="{{ route('teacher_availablity.show',$teacher->id) }}"><i class="bi bi-eye"></i></a>
                        <a class="btn btn-primary" href="{{ route('teacher_availablity.edit',$teacher->id) }}"><i class="bi bi-pencil-square"></i></a>
                        <a class="btn btn-danger" href="{{ route('teacher_availablity.destroy', $teacher->id) }}" onclick = archiveFunction() ><i class="bi bi-archive-fill"></i></a>
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
